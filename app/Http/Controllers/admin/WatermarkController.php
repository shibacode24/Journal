<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Watermark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WatermarkController extends Controller
{
    public function watermark(){
        $watermarkedit = Watermark::first(); 
    
        $watermark = Watermark::all();
        return view('admin.add_watermark',['watermark'=>$watermark,'watermarkedit'=>$watermarkedit]);
    
 }
 public function create_watermark(Request $request){
    $validator = Validator::make(
        $request->all(),
        [     
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ],
     [     
            'file.required' => 'Please Enter image.',
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('panel/images/watermark_img'), $filename);
   
        }   
    
       $watermark=new Watermark;
       $watermark->watermark=$filename;
       $watermark->save();

       return redirect(route('watermark'))->with(['success'=>'Data succesfully inserted.']);
}
public function edit_watermark($id)
   {
       $watermarkedit = Watermark::find($id); 
       $watermark = Watermark::all();
       return view('admin.edit_watermark',['watermarkedit'=>$watermarkedit,'watermark'=>$watermark]);
      
       
   }
  
   public function update_watermark(Request $request)
   {

    $validator = Validator::make(
        $request->all(),
        [   
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',     
        ]);
    //  [
    //     'file.required' => 'Please Enter image.',
        
    //     ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('panel/images/watermark_img'), $filename);
   
        }   

       Watermark::where('id',$request->id)->update([ 
        'watermark'=>$filename,
    ]);

     return redirect()->route('watermark')->with(['success'=>'Data succesfully updated !']);
   }


   public function delete_watermark($id)
   {
       $watermark=Watermark::where('id',$id)->delete();
       return redirect(route('watermark'));
   }
}
