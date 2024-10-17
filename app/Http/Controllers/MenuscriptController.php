<?php

namespace App\Http\Controllers;

use App\Models\admin\Category;
use App\Models\admin\Footer;
use App\Models\admin\Header;
use App\Models\admin\Watermark;
use App\Models\author\author_email;
use App\Models\Menuscript;
use App\Models\SubmitPaper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class MenuscriptController extends Controller
{
    public function menuscript(){
      
        $menuscript = Menuscript::where('user_id',1)->get();
        $category = Category::all();

        return view('admin.spl_issues',compact('menuscript','category'));
    
 }

//  public function download_spl_menuscript(){
      
//     $menuscript = Menuscript::where('id',$id)->first();
  
//     return back();

// }
 

 public function create_menuscript(Request $request){
// dd(1);
    $validator = Validator::make(
        $request->all(),
        [      
            'category_id' => 'required',
            'menuscript_title' => 'nullable|string',
            'date_of_submission' => 'nullable|string',
            'file' => 'required|mimes:doc,docx,pdf',
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
            $file->move(public_path('panel/images/menuscript_file'), $filename);
   
        }   
    
       $menuscript=new Menuscript;

       $menuscript->file=$filename;
       $menuscript->user_id= auth()->user()->id;
       $menuscript->category_id=$request->category_id;
       $menuscript->menuscript_title=$request->menuscript_title;
       $menuscript->date_of_submission=$request->date_of_submission;

       $menuscript->save();

       return redirect(route('menuscript'))->with(['success'=>'Menuscript succesfully inserted.']);
}

public function get_author()
{
    $author = User::where('role','author')->get();
    return view('admin.authors',compact('author'));
}

public function get_reviewer()
{
    $reviewers = User::where('role','reviewer')->get();
    return view('admin.reviewers',compact('reviewers'));
}


public function reviewer_status(Request $request)
{
    // dd($request->all());
    $reviewers = User::
    where('id',$request->id)
    ->update([
     'status'=>$request->status
    ]);


    session()->flash('msg','successfull');
    return redirect('get_reviewer');
}


public function author_status(Request $request)
{
    // dd($request->all());
    $authors = User::
    where('id',$request->id)
    ->update([
     'status'=>$request->status
    ]);


    session()->flash('msg','successfull');
    return redirect('get_author');
}

public function all_menuscript(Request $request)
{
    $editor_list = User ::where('role','editor')
    ->get();

    $all_menuscript = Menuscript :: where('withdrawal_status','0')
    ->where('user_id','!=', 1)
    ->orderby('id','desc')
    ->get();

    return view('admin.menuscript',compact('all_menuscript','editor_list'));
}

public function get_menuscript(Request $request)
{
    $script = SubmitPaper :: where('menuscript_id',$request->id)->first();
    // $script = SubmitPaper :: where('id',10)->first();

    $header = Header ::first();
    $footer = Footer :: first();
    $watermark = Watermark ::first();


// echo json_encode($script);
// exit();
    return view('menuscript_pdf',compact('script','header','footer','watermark'));
}


// public function get_menuscript(Request $request)
// {
//     $script = SubmitPaper::where('menuscript_id', $request->id)->first();
//     $header = Header::first();
//     $footer = Footer::first();
//     $watermark = Watermark::first();

//     $data = compact('script', 'header', 'footer', 'watermark');
//     $pdf = Pdf::loadView('menuscript_pdf', $data);

//     return $pdf->download('menuscript.pdf');
// }

public function withdrawal_list()
{
    $withdrawal_list = Menuscript ::where('withdrawal_status','1')
    ->get();

    return view('admin.withdrawal_menuscript',compact('withdrawal_list'));
}

public function assign_editor(Request $request)
{
// dd($request->assign_editor_id);
    $manuscript = Menuscript::find($request->id);

    $manuscript->assign_editor = $request->assign_editor_id;
    $manuscript->save();

    $get_user_data = User :: where('id',$request->assign_editor_id)->first();
    $user = $get_user_data->email;
    $data = $manuscript;

     author_email::create([
        'user_id' => $request->assign_editor_id,
        'to' => $user,
        'subject' => 'Menuscript Assigned',
        'from' => 'temporary9794@gmail.com',
        'body' => view('emails.menuscript_assigned_to_editor', ['data' => $data , 'get_user_data' => $get_user_data])->render(),
    ]);

//   Mail::send('emails.menuscript_assigned_to_editor', ['data' => $data , 'get_user_data' => $get_user_data], function ($message) use ($user) {
//         $message->to($user)
//             ->subject('Menuscript Assigned');
//         $message->from('temporary9794@gmail.com', 'Journal');
//     });

    return redirect()->route('all_menuscript')->with('success','Editor assign successfully');
}


}
