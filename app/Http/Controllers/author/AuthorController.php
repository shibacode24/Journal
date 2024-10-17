<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\Menuscript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\MenuscriptSubmitted;
use App\Models\author\author_email;
use App\Models\editor\Assign_Reviewer;
use App\Models\SubmitPaper;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
// use Mail;
class AuthorController extends Controller
{
    public function author_dashboard()
    {
      $published_menuscript = Menuscript :: where('publish_script','1')
      ->where('user_id',auth()->user()->id)
      ->count();
      $withdrawal_menuscript = Menuscript :: where('withdrawal_status','1')
      ->where('user_id',auth()->user()->id)
      ->count();
      $new_submission = SubmitPaper::
        whereHas('menuscipt_data', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
    ->count();
      
    //   echo json_encode($published_menuscript);
    //   exit();
     return view('author.dashboard',compact('published_menuscript','withdrawal_menuscript','new_submission'));
    }

    public function add_menuscript()
    {
        $category = Category::get();
     return view('author.add_menuscript',compact('category'));
    }

    // public function author_create_menuscript(Request $request){
    //     // dd(1);
    //         $validator = Validator::make(
    //             $request->all(),
    //             [      
    //                 'category_id' => 'required',
    //                 'menuscript_title' => 'nullable|string',
    //                 'date_of_submission' => 'nullable|string',
    //                 // 'file' => 'required|mimes:doc,docx',
    //             ]);
        
    //             if ($validator->fails()) {
    //                 $errors = '';
    //                 $messages = $validator->messages();
    //                 foreach ($messages->all() as $message) {
    //                     $errors .= $message . "<br>";
    //                 }
    //                 return back()->with(['error'=>$errors]);
    //             }
        
    //             $filename = "";

    //             if ($request->hasFile('file')) {
    //                 $file = $request->file('file');
    //                 $filename = time() . '.' . $file->getClientOriginalExtension();
    //                 $file->move(public_path('panel/images/menuscript_file'), $filename);
           
    //             }   
            
    //            $menuscript=new Menuscript();
        
    //            $menuscript->file=$filename;
    //            $menuscript->user_id= auth()->user()->id;
    //            $menuscript->category_id=$request->category_id;
    //            $menuscript->menuscript_title=$request->menuscript_title;
    //            $menuscript->date_of_submission=$request->date_of_submission;
        
    //            $menuscript->save();

    //         //    Mail::to(auth()->user()->email)->send(new MenuscriptSubmitted());

    //         // $data = $request->all();
           
    //         // $mail=Mail::send('emails.menuscript-submitted', ["data"=>$data],function($message) use($data) {
    //         //        $message->to(auth()->user()->email)
    //         //        ->subject('Menuscript Submitted');
    //         //        $message->from('shibakhan1970@gmail.com', 'Shiba');
    //         //     });
    //     // echo json_encode($mail);
    //     // exit();
    //            return redirect()->route('upload_menuscript')->with('menuscript_id', $menuscript->id);
    //     }

    public function author_create_menuscript(Request $request)
{

    $now = Carbon::now();
    $year = $now->year;
    $month = $now->month;
    $date = $now->day;
  
   $unique_id = $year . $month . $date . $request->category_id . rand(0,9);
//    echo json_encode($unique_id);
//    exit();
    // Validate the request
    $validator = Validator::make($request->all(), [
        'category_id' => 'required',
        'menuscript_title' => 'nullable|string',
        'date_of_submission' => 'nullable|string',
        'file' => 'required|mimes:doc,docx',
    ]);
    if ($validator->fails()) {
        $errors = '';
        $messages = $validator->messages();
        foreach ($messages->all() as $message) {
            $errors .= $message . "<br>";
        }
        return back()->with(['error' => $errors]);
    }
    // Handle file upload
    $filename = '';
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('panel/images/menuscript_file'), $filename);
    }
    // Save the manuscript
    $menuscript = new Menuscript();
    $menuscript->file = $filename;
    $menuscript->user_id = auth()->user()->id;
    $menuscript->unique_id = $unique_id;
    $menuscript->category_id = $request->category_id;
    $menuscript->menuscript_title = $request->menuscript_title;
    $menuscript->date_of_submission = $request->date_of_submission;
    $menuscript->save();
    // Send email notification
    $user = auth()->user();
    $data = $request->all();

    // author_email::create([
    //     'user_id' => $user->id,
    //     'to' => $user->email,
    //     'subject' => 'Menuscript Submitted',
    //     'from' => 'temporary9794@gmail.com',
    //     'body' => view('emails.menuscript-submitted', ['data' => $data])->render(),
    // ]);

    // Mail::send('emails.menuscript-submitted', ['data' => $data], function ($message) use ($user) {
    //     $message->to($user->email)
    //         ->subject('Menuscript Submitted');
    //     $message->from('temporary9794@gmail.com', 'Journal');
    // });

  
    return redirect()->route('upload_menuscript')->with('menuscript_id', $menuscript->id);
}
        
    public function upload_menuscript()
    {
        $category = Category::get();
        $menuscriptId = session('menuscript_id');
        // echo json_encode($menuscriptId);
        // exit();
     return view('author.upload_menuscript',compact('category','menuscriptId'));
    }


    public function edit_menuscript($id)
    {
        // dd($id);
        $category = Category::get();
        $menuscriptId = session('menuscript_id');

        $menuscript = Menuscript :: find($id);

        $added_menuscript = SubmitPaper :: where('menuscript_id',$id)
        ->first();
        // echo json_encode($added_menuscript);
        // exit();
     return view('author.update_menuscript',compact('category','menuscriptId','added_menuscript'));
    }

    public function added_menuscript()
    {
        
    $added_menuscript = Menuscript :: 
    join('submitpaper','submitpaper.menuscript_id','=','menuscript.id')
    ->where('user_id',auth()->user()->id)
    ->where('withdrawal_status','0')
    ->select('menuscript.*','submitpaper.resubmitted_status','submitpaper.resubmitted_editor_status')
    ->get();
    
     return view('author.added_menuscript',compact('added_menuscript'));
    }

    public function rejected_menuscript()
    {
        
    $rejected_menuscript = Menuscript :: where('user_id',auth()->user()->id)
    ->where('editor_status','Rejected')
    ->get();
    
     return view('author.rejected_menuscript',compact('rejected_menuscript'));
    }

    public function author_notification()
    {
        $emails = author_email :: where('user_id',auth()->user()->id)->get();
        // echo json_encode(auth()->user()->id);
        // exit();
         return view('author.notification',compact('emails'));
    }

    public function withdraw_script($id)
    {
        $withdraw_script = Menuscript :: where('id',$id)->first();
        $withdraw_script->withdrawal_status = '1';
        $withdraw_script->save();

        $user = auth()->user();
        $data = $withdraw_script;

         author_email::create([
        'user_id' => $user->id,
        'to' => $user->email,
        'subject' => 'Withdrawal Menuscript',
        'from' => 'temporary9794@gmail.com',
        'body' => view('emails.withdrawal_menuscript', ['data' => $data])->render(),
    ]);

    Mail::send('emails.withdrawal_menuscript', ['data' => $data], function ($message) use ($user) {
        $message->to($user->email)
            ->subject('Menuscript Submitted');
        $message->from('temporary9794@gmail.com', 'Journal');
    });

         return back();
    }

    public function published_menuscript()
    {
    $published_menuscript = Menuscript :: where('user_id',auth()->user()->id)
    ->where('publish_script','1')
    ->get();
     return view('author.published_menuscript',compact('published_menuscript'));
    }

    function get_status_tracker_for_author(Request $request){
        $assign_reviewer = Assign_Reviewer::
        where('menuscript_id',$request->menuscript_id)->get();
        // where('assign_reviewer_id',$request->assign_reviewer_id)->get();
// echo json_encode($assign_reviewer);
//         exit();
        $view=view('author.author_status_view',compact('assign_reviewer'))->render();
        return response()->json($view);
    }

    public function updatePaper(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'title_of_paper' => 'required|string',
            'author' => 'required|string',
            'affiliation' => 'required|string',
            'email' => 'required|email',
            'abstract' => 'required|string',
            'keywords' => 'required|string',
            'introduction' => 'required|string',
            'results' => 'required|string',
            'discussion' => 'required|string',
            'materials_and_methods' => 'required|string',
            'conclusion' => 'required|string',
            'abbreviations' => 'required|string',
            'declarations' => 'required|string',
            'conflict_of_interests' => 'required|string',
            'funding' => 'required|string',
            'acknowledgment' => 'required',
            'references' => 'required',
            // Add validation rules for other fields as needed
        ]);
        // dd($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the existing Paper instance
        $paper = SubmitPaper::find($request->id);
    
        // Update the Paper instance with the new values or keep existing ones if new values aren't provided
        $paper->category_id = $request->input('category_id') ?? $paper->category_id;
        $paper->menuscript_id = $request->input('menuscript_id') ?? $paper->menuscript_id;
        $paper->title_of_paper = $request->input('title_of_paper') ?? $paper->title_of_paper;
        $paper->author_name = $request->input('author') ?? $paper->author_name;
        $paper->affiliation = $request->input('affiliation') ?? $paper->affiliation;
        $paper->email = $request->input('email') ?? $paper->email;
        $paper->abstract = $request->input('abstract') ?? $paper->abstract;
        $paper->keyword = $request->input('keywords') ?? $paper->keyword;
        $paper->introduction = $request->input('introduction') ?? $paper->introduction;
        $paper->results = $request->input('results') ?? $paper->results;
        $paper->discussion = $request->input('discussion') ?? $paper->discussion;
        $paper->materials_and_methods = $request->input('materials_and_methods') ?? $paper->materials_and_methods;
        $paper->conclusion = $request->input('conclusion') ?? $paper->conclusion;
        $paper->abbreviations = $request->input('abbreviations') ?? $paper->abbreviations;
        $paper->declarations = $request->input('declarations') ?? $paper->declarations;
        $paper->conflict_of_interests = $request->input('conflict_of_interests') ?? $paper->conflict_of_interests;
        $paper->funding = $request->input('funding') ?? $paper->funding;
        $paper->acknowledgment = $request->input('acknowledgment') ?? $paper->acknowledgment;
        $paper->references = $request->input('references') ?? $paper->references;
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($paper->image) {
                $oldImagePath = public_path('submit_paper/' . $paper->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Upload the new image
            $file = $request->file('image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('submit_paper/'), $filename);
            $paper->image = $filename;
        }
    
        $paper->resubmitted_status = '0';

        // Save the updated paper
        $paper->save();
    
        // Prepare email data
        $data = $request->all();
    
        // Send the email notification
        Mail::send('emails.menuscript-updated', ['data' => $data], function ($message) use ($request) {
            $message->to($request->input('email'))
                ->subject('Resubmitted Menuscript');
            $message->from('temporary9794@gmail.com', 'Journal');
        });
    
        // Return a success message
        return redirect()->route('added_menuscript')->with(['success','Paper updated successfully']);
    }
    



    public function edit_menuscript_for_editor($id)
    {
        // dd($id);
        $category = Category::get();
        $menuscriptId = session('menuscript_id');

        $menuscript = Menuscript :: find($id);

        $added_menuscript = SubmitPaper :: where('menuscript_id',$id)
        ->first();
        // echo json_encode($added_menuscript);
        // exit();
     return view('author.update_script_for_editor',compact('category','menuscriptId','added_menuscript'));
    }

    public function updatePaper_for_editor(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'title_of_paper' => 'required|string',
            'author' => 'required|string',
            'affiliation' => 'required|string',
            'email' => 'required|email',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string',
            'introduction' => 'nullable|string',
            'results' => 'nullable|string',
            'discussion' => 'nullable|string',
            'materials_and_methods' => 'nullable|string',
            'conclusion' => 'nullable|string',
            'abbreviations' => 'nullable|string',
            'declarations' => 'nullable|string',
            'conflict_of_interests' => 'nullable|string',
            'funding' => 'nullable|string',
            'acknowledgment' => 'nullable|string',
            'references' => 'nullable|string',
            // Add validation rules for other fields as needed
        ]);
    
        // Find the existing Paper instance
        $paper = SubmitPaper::find($request->id);
    
        // Update the Paper instance with the new values or keep existing ones if new values aren't provided
        $paper->category_id = $request->input('category_id') ?? $paper->category_id;
        $paper->menuscript_id = $request->input('menuscript_id') ?? $paper->menuscript_id;
        $paper->title_of_paper = $request->input('title_of_paper') ?? $paper->title_of_paper;
        $paper->author_name = $request->input('author') ?? $paper->author_name;
        $paper->affiliation = $request->input('affiliation') ?? $paper->affiliation;
        $paper->email = $request->input('email') ?? $paper->email;
        $paper->abstract = $request->input('abstract') ?? $paper->abstract;
        $paper->keyword = $request->input('keywords') ?? $paper->keyword;
        $paper->introduction = $request->input('introduction') ?? $paper->introduction;
        $paper->results = $request->input('results') ?? $paper->results;
        $paper->discussion = $request->input('discussion') ?? $paper->discussion;
        $paper->materials_and_methods = $request->input('materials_and_methods') ?? $paper->materials_and_methods;
        $paper->conclusion = $request->input('conclusion') ?? $paper->conclusion;
        $paper->abbreviations = $request->input('abbreviations') ?? $paper->abbreviations;
        $paper->declarations = $request->input('declarations') ?? $paper->declarations;
        $paper->conflict_of_interests = $request->input('conflict_of_interests') ?? $paper->conflict_of_interests;
        $paper->funding = $request->input('funding') ?? $paper->funding;
        $paper->acknowledgment = $request->input('acknowledgment') ?? $paper->acknowledgment;
        $paper->references = $request->input('references') ?? $paper->references;
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($paper->image) {
                $oldImagePath = public_path('submit_paper/' . $paper->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Upload the new image
            $file = $request->file('image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('submit_paper/'), $filename);
            $paper->image = $filename;
        }
    
        $paper->resubmitted_editor_status = '0';

        // Save the updated paper
        $paper->save();
    
        // Prepare email data
        $data = $request->all();
    
        // Send the email notification
        Mail::send('emails.menuscript-updated', ['data' => $data], function ($message) use ($request) {
            $message->to($request->input('email'))
                ->subject('Resubmitted Menuscript');
            $message->from('temporary9794@gmail.com', 'Journal');
        });
    
        // Return a success message
        return redirect()->route('added_menuscript')->with(['success','Paper updated successfully']);
    }

}
