<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeaderController extends Controller
{
    public function header(){
        $headeredit = Header::first(); 
    
        $header = Header::all();
        return view('admin.add_header',['header'=>$header,'headeredit'=>$headeredit]);
    
 }
 public function create_header(Request $request){
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
            $file->move(public_path('panel/images/header_img'), $filename);
   
        }   
    
       $header=new Header;
       $header->header=$filename;
       $header->save();

       return redirect(route('header'))->with(['success'=>'Data succesfully inserted.']);
}
public function edit_header($id)
   {
       $headeredit = Header::find($id); 
       $header = Header::all();
       return view('admin.edit_header',['headeredit'=>$headeredit,'header'=>$header]);
      
       
   }
  
   public function update_header(Request $request)
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
            $file->move(public_path('panel/images/header_img'), $filename);
   
        }   

       Header::where('id',$request->id)->update([ 
        'header'=>$filename,
    ]);

     return redirect()->route('header')->with(['success'=>'Data succesfully updated !']);
   }


   public function delete_header($id)
   {
       $header=Header::where('id',$id)->delete();
       return redirect(route('header'));
   }
}
