<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterController extends Controller
{
    public function footer(){
        $footeredit = Footer::first();
        $footer = Footer::all();
        return view('admin.add_footer',['footer'=>$footer, 'footeredit'=>$footeredit]);
    
 }
 public function create_footer(Request $request){
    $validator = Validator::make(
        $request->all(),
        [     
       'file' => 'required',
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
            $file->move(public_path('panel/images/footer_img'), $filename);
   
        }   
    
       $footer=new Footer;
       $footer->footer=$filename;
       $footer->save();

       return redirect(route('footer'))->with(['success'=>'Data succesfully inserted.']);
}
public function edit_footer(Footer $footer,$id)
   {
       $footeredit = Footer::find($id); 
       $footer = Footer::all();
       return view('admin.edit_footer',['footeredit'=>$footeredit,'footer'=>$footer]);
      
       
   }
  
   public function update_footer(Request $request)
   {

    $validator = Validator::make(
        $request->all(),
        [   
            'file' => 'required',         
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
            $file->move(public_path('panel/images/footer_img'), $filename);
   
        }   

       Footer::where('id',$request->id)->update([ 
        'footer'=>$filename,
    ]);

     return redirect()->route('footer')->with(['success'=>'Data succesfully updated !']);
   }


   public function delete_footer($id)
   {
       $footer=Footer::where('id',$id)->delete();
       return redirect(route('footer'));
   }
}
