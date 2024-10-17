<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use App\Models\admin\Footer;
use App\Models\admin\Header;
use App\Models\admin\Watermark;
use App\Models\author\author_email;
use App\Models\editor\Assign_Reviewer;
use App\Models\Menuscript;
use App\Models\SubmitPaper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use storage;
class EditorPanelController extends Controller
{
    public function editor_menuscript()
    {
    $reviewer_list = User :: where('role','reviewer')->get();
    $menuscript = Menuscript :: where('assign_editor', auth()->user()->id)->get();
     return view('editor.menuscript',compact('menuscript','reviewer_list'));
    }

    public function editor_dashboard()
    {

        $total_menuscript = Menuscript :: where('publish_script','0')
        ->count();


        $publish_menuscript = Menuscript :: where('publish_script','1')
        ->count();

        $pending_menuscript = Menuscript :: where('editor_status', NULL)
        ->count();

     return view('editor.dashboard',compact('total_menuscript','publish_menuscript','pending_menuscript'));
    }

    public function assign_reviewer(Request $request)
    {
        // dd($request->all());
        for($i=0;$i<count($request->assign_reviewer_id); $i++)
        {
        $assign_reviewer = new Assign_Reviewer();
        $assign_reviewer->menuscript_id = $request->menuscript_id;
        $assign_reviewer->assign_reviewer_id = $request->assign_reviewer_id[$i];
        // $assign_reviewer->reviewer_remark = $request->id[$key];
        // $assign_reviewer->reviewer_status = $request->id[$key];
        $assign_reviewer->save();
        }
    
        $manuscript = Menuscript::find($request->menuscript_id);
        $manuscript->assign_status = '1';
        $manuscript->save();
    

        $get_user_data = User::whereIn('id', $request->assign_reviewer_id)->get();

        // echo json_encode($request->assign_reviewer_id);
        // exit();
        $data = $manuscript;

        foreach ($get_user_data as $user) {
            author_email::create([
                'user_id' => $user->id,
                'to' => $user->email,
                'subject' => 'Manuscript Assigned',
                'from' => 'temporary9794@gmail.com',
                'body' => view('emails.manuscript_assigned_to_reviewer', ['data' => $data, 'get_user_data' => $user])->render(),
            ]);
        
            Mail::send('emails.manuscript_assigned_to_reviewer', ['data' => $data, 'get_user_data' => $user], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Manuscript Assigned');
                $message->from('temporary9794@gmail.com', 'Journal');
            });
        }

        
        return redirect()->route('assigned_menuscript')->with('success','Reviewer assign successfully');
    }

    public function assigned_menuscript()
    {
        // $reviewer_list = User :: where('role','reviewer')->get();

        $assign_reviewer = Assign_Reviewer ::get()->groupby('menuscript_id');
        // echo json_encode($assign_reviewer);
        // exit();
     return view('editor.assign_reviewer',compact('assign_reviewer'));
    }


    function get_reviewer_status_tracker(Request $request){
        $assign_reviewer = Assign_Reviewer::
        where('menuscript_id',$request->menuscript_id)
        ->where('assign_reviewer_id',$request->assign_reviewer_id)->get();
        $view=view('editor.status_tracker',compact('assign_reviewer'))->render();
        return response()->json($view);
    }

    public function update_editor_status(Request $request)
    {
    
        $manuscript = Menuscript::find($request->script_id);
        $manuscript->editor_status = $request->editor_status;
        $manuscript->editor_remark = $request->editor_remark;
        $manuscript->save();
    
        
        if ($request->editor_status != 'Accepted') {

            $paper = SubmitPaper:: where('menuscript_id',$request->script_id)->first();
            $paper->resubmitted_editor_status = '1';
            $paper->save();
        } 
        else{
            $paper = SubmitPaper:: where('menuscript_id',$request->script_id)->first();
            $paper->resubmitted_editor_status = '3';
            $paper->save();
        }

        $user = auth()->user();
        $data = $request->all();
    
        author_email::create([
            'user_id' => $user->id,
            'to' => $user->email,
            'subject' => 'ThankYou Message ',
            'from' => 'temporary9794@gmail.com',
            'body' => view('emails.thankyou_msg_for_editor', ['data' => $data])->render(),
        ]);
    
        Mail::send('emails.thankyou_msg_for_editor', ['data' => $data], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Menuscript Submitted');
            $message->from('temporary9794@gmail.com', 'Journal');
        });

        return back()->with('success','Successfully Sent');
    }

    public function pending_for_publish_approval()
    {

    $menuscript = Menuscript :: where('editor_status', 'Accepted')
    ->where('publish_script', '0')
    ->get();
     return view('editor.pending_menuscripts',compact('menuscript'));
    }

    public function publish_menuscript()
    { 
    $menuscript = Menuscript :: where('publish_script', '1')->get();
    
     return view('editor.published_menuscript',compact('menuscript'));
    }


    public function editor_notification()
    {
        $notification = author_email ::
            where('user_id', auth()->user()->id)->get();
     return view('editor.notification',compact('notification'));
    }
   
    public function publish(Request $request)
    {
        
        $script = SubmitPaper::where('menuscript_id', $request->id)->first();
        $header = Header::first();
        $footer = Footer::first();
        $watermark = Watermark::first();
    
        // Generate PDF using Dompdf
        $html = view('menuscript_pdf', compact('script', 'header', 'footer', 'watermark'))->render();
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
    
        // Add header
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
    
        $dompdf->render();
    
        // Add header and footer
        $canvas = $dompdf->getCanvas();
        // $canvas->page_text(0, 0, "Header: " . $header->header, null, 12, array(0, 0, 0));
        // $canvas->page_text(0, $canvas->get_height() - 15, "Footer: " . $footer->footer, null, 12, array(0, 0, 0));
    
        // Save PDF to public folder
        $fileName = 'menuscript_' . time() . '.pdf';
        $filePath = public_path('panel/images/menuscript_file/' . $fileName);
    
        file_put_contents($filePath, $dompdf->output());

        $publish = Menuscript :: where('id',$request->id)->first();
        $publish->publish_date = Carbon::now();
        $publish->publish_script = '1';
        $publish->file = $fileName;
        $publish->save();

        
        return back()->with('success','Menuscript Published Successfully');
    }

}
