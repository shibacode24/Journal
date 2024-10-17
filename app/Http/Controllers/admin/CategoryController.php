<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Fpdf\Fpdf;

class CategoryController extends Controller
{
    public function category(Request $request){

        $category = Category::all();
        return view('admin.add_category',['category'=>$category]);
    
 }
 public function create_category(Request $request){
    $validator = Validator::make(
        $request->all(),
        [     
       'category_name' => 'required',
    ],
     [     
            'category_name.required' => 'Please Enter Company Name.',
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('panel/images/category_image'), $filename);
    
        }

      
       $category=new Category;
       $category->category_name=$request->get('category_name');
       $category->category_image=$filename;
       
       $category->save(); 
       return redirect(route('category'))->with(['success'=>'Data succesfully inserted.']);
}
public function edit_category(Category $category,$id)
   {
       $categoryedit = Category::find($id); 
       $category = Category::all();
       return view('admin.edit_category',['categoryedit'=>$categoryedit,'category'=>$category]);
      
       
   }
  
   public function update_category(Request $request)
   {

    $validator = Validator::make(
        $request->all(),
        [   
            'category_name' => 'required',         
    ],
     [
        'category_name.required' => 'Please Enter Company Name.',
        
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }
        $category = Category::where('id',$request->id)->first();

       if ($request->hasFile('category_image')) {
        $file = $request->file('category_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('panel/images/category_image'), $filename);

    }
  
   $category->category_name=$request->get('category_name');
   $category->category_image=$filename;
   
   $category->save(); 

     return redirect()->route('category')->with(['success'=>'Data succesfully updated !']);
   }


   public function delete_category($id)
   {
       $category=Category::where('id',$id)->delete();
       return redirect(route('category'));
   }

}
