<?php

namespace App\Http\Controllers\reviewer;

use App\Http\Controllers\Controller;
use App\Models\admin\Footer;
use App\Models\admin\Header;
use App\Models\admin\Watermark;
use App\Models\author\author_email;
use App\Models\editor\Assign_Reviewer;
use App\Models\Menuscript;
use App\Models\SubmitPaper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class ReviewerController extends Controller
{
    public function reviewer_dashboard()
    {
        $assign_menuscript = Assign_Reviewer ::where('decision','0')
        ->where('assign_reviewer_id',auth()->user()->id)
        ->count();
        $pending_menuscript = Assign_Reviewer :: where('decision','0')
        ->where('assign_reviewer_id',auth()->user()->id)
        ->count();
     return view('reviewer.dashboard',compact('assign_menuscript','pending_menuscript'));
    }


    public function reviewer_notification()
    {
        $notification = author_email ::
        where('user_id', auth()->user()->id)->get();
     return view('reviewer.notification',compact('notification'));
    }


    // public function assign_all_menuscript()
    // {
    //     $menuscript = Assign_Reviewer ::
    //     // where('decision','0')
    //      where('assign_reviewer_id', auth()->user()->id)->groupby('menuscript_id')->get();
    //  return view('reviewer.menuscript',compact('menuscript'));
    // }


    public function assign_all_menuscript()
    {
        // Ensure the user is authenticated
        $user = auth()->user();
        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login');
        }
    
        // Retrieve manuscripts assigned to the currently authenticated reviewer, grouped by manuscript ID
        $menuscript = Assign_Reviewer::select('assign_reviewer.menuscript_id', DB::raw('MAX(assign_reviewer.id) as id'))
        ->join('submitpaper','submitpaper.menuscript_id','=','assign_reviewer.menuscript_id')
                                      ->where('assign_reviewer_id', $user->id)
                                      ->where('decision','0')
                                      ->orwhere('submitpaper.resubmitted_status','0')
                                      ->groupBy('assign_reviewer.menuscript_id')
                                      
                                      ->with('get_menuscript') // Ensure you have a relationship defined in your Assign_Reviewer model
                                      ->get();
    
        // Pass the retrieved manuscripts to the view
        return view('reviewer.menuscript', compact('menuscript'));
    }
    
//     echo json_encode($menuscript);
// exit();

    public function add_remark($id)
    {
        // Retrieve the manuscript by its ID
        $manuscript = Assign_Reviewer::find($id);

        // Check if manuscript exists
        if (!$manuscript) {
            return redirect()->back()->with('error', 'Manuscript not found.');
        }

        // Pass the manuscript to the view
        return view('reviewer.add_remark', compact('manuscript'));
    }

    // public function reviewer_decision(Request $request)
    // {
    //     // Handle file upload
    //     $filename = "";
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('panel/images/remark_file'), $filename);
   
    //     }   

    //     // Retrieve the review ID from the request (you need to include it in the form)
    //     $reviewId = $request->input('id');

    //     // Find the review record and update it
    //     $review = Assign_Reviewer::find($reviewId);
    //     if ($review) {
    //         $review->reviewer_remark = $request->input('reviewer_remark'); 
    //         $review->file = $filename;
    //         $review->decision ='1';
    //         $review->reviewer_status = $request->input('reviewer_status');
    //         $review->save();
    //     }
        

    //     // Redirect or return a response
    //     return redirect()->route('assign_all_menuscript')->with('success', 'Updated successfully.');
    // }



    public function reviewer_decision(Request $request)
{
    // dd($request->all());
    // Handle file upload
    $filename = "";
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('panel/images/remark_file'), $filename);
    }   

    // Retrieve the review ID from the request (you need to include it in the form)
    $reviewId = $request->input('id');

    // Find the review record
    $review = Assign_Reviewer::find($reviewId);
// echo json_encode($review);
// exit();
    if ($review) {
        // Check if this is the first update
        if ($review->decision === '0') {
            // First update, update the existing record
            $review->reviewer_remark = $request->input('reviewer_remark');
            $review->file = $filename;
            $review->decision = '1';
            $review->reviewer_status = $request->input('reviewer_status');
            $review->save();
        } else {
            // Subsequent updates, create a new record
            $newReview = new Assign_Reviewer();
            $newReview->menuscript_id = $review->menuscript_id;
            $newReview->assign_reviewer_id = auth()->user()->id;
            $newReview->reviewer_remark = $request->input('reviewer_remark');
            $newReview->file = $filename;
            $newReview->decision = '1';
            $newReview->reviewer_status = $request->input('reviewer_status');
            $newReview->save();
        }
        
    }

    if ($request->reviewer_status != 'Accepted') {

        $paper = SubmitPaper:: where('menuscript_id',$review->menuscript_id)->first();
        $paper->resubmitted_status = '1';
        $paper->save();
    } 
    else{
        $paper = SubmitPaper:: where('menuscript_id',$review->menuscript_id)->first();
        $paper->resubmitted_status = '3';
        $paper->save();
    }

    $user = auth()->user();
    $data = $request->all();
// echo json_encode($data);
// exit();
    author_email::create([
        'user_id' => $user->id,
        'to' => $user->email,
        'subject' => 'ThankYou Message ',
        'from' => 'temporary9794@gmail.com',
        'body' => view('emails.thankyou_msg_for_reviewer', ['data' => $data])->render(),
    ]);

    Mail::send('emails.thankyou_msg_for_reviewer', ['data' => $data], function ($message) use ($user) {
        $message->to($user->email)
            ->subject('Menuscript Submitted');
        $message->from('temporary9794@gmail.com', 'Journal');
    });

// for author
    $menuscript_data = Menuscript :: where('id',$review->menuscript_id)->select('user_id','menuscript_title')->first();

    $user_data = User :: where('id',$menuscript_data->user_id)->select('id','email','first_name','last_name')->first();
    

    author_email::create([
        'user_id' => $user_data->id,
        'to' => $user_data->email,
        'subject' => 'ThankYou Message ',
        'from' => 'temporary9794@gmail.com',
        'body' => view('emails.reviewer_response_to_author', ['data' => $data, 'menuscript_data' => $menuscript_data , 'user_data' => $user_data ])->render(),
    ]);

    Mail::send('emails.reviewer_response_to_author', ['data' => $data, 'menuscript_data' => $menuscript_data , 'user_data' => $user_data ], function ($message) use ($user_data) {
        $message->to($user_data->email)
            ->subject('Menuscript Submitted');
        $message->from('temporary9794@gmail.com', 'Journal');
    });


    // Redirect or return a response
    return redirect()->route('assign_all_menuscript')->with('success', 'Updated successfully.');
}


public function get_pdf(Request $request)
{
    $script = SubmitPaper :: where('menuscript_id',$request->id)->first();
    // $script = SubmitPaper :: where('id',10)->first();

    $header = Header ::first();
    $footer = Footer :: first();
    $watermark = Watermark ::first();


// echo json_encode($script);
// exit();
    return view('reviewer.pdf',compact('script','header','footer','watermark'));
}


}
