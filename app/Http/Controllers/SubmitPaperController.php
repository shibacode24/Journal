<?php

namespace App\Http\Controllers;

use App\Models\author\author_email;
use Illuminate\Http\Request;
use App\Models\SubmitPaper;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use validator;

class SubmitPaperController extends Controller
{
   public function submit_paper()
   {
    return view('website.submit_paper');
   }
   public function storePaper(Request $request)
{
    // dd($request->all());
    // Validate form data
    $validator = FacadesValidator::make($request->all(), [
        'title_of_paper' => 'required|string',
        'author' => 'required|string',
        'affiliation' => 'required',
        'email' => 'required',
        'abstract' => 'required',
        'keywords' => 'required',
        'introduction' => 'required',
        'results' => 'required',
        'discussion' => 'required',
        'materials_and_methods' => 'required',
        'conclusion' => 'required',
        'abbreviations' => 'required',
        'declarations' => 'required',
        'conflict_of_interests' => 'required',
        'funding' => 'required',
        'acknowledgment' => 'required',
        'references' => 'required',
        // Add validation rules for other fields as needed
    ]);
    // dd($validator);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    // Create a new Paper instance
    $paper = new SubmitPaper;
    $paper->category_id = $request->input('category_id');
    $paper->menuscript_id = $request->input('menuscript_id');
    $paper->title_of_paper = $request->input('title_of_paper');
    $paper->author_name = $request->input('author');
    $paper->affiliation = $request->input('affiliation');
    $paper->email = $request->input('email');
    $paper->abstract = $request->input('abstract');
    $paper->keyword = $request->input('keywords');
    $paper->introduction = $request->input('introduction');
    $paper->results = $request->input('results');
    $paper->discussion = $request->input('discussion');
    $paper->materials_and_methods = $request->input('materials_and_methods');
    $paper->conclusion = $request->input('conclusion');
    $paper->abbreviations = $request->input('abbreviations');
    $paper->declarations = $request->input('declarations');
    $paper->conflict_of_interests = $request->input('conflict_of_interests');
    $paper->funding = $request->input('funding');
    $paper->acknowledgment = $request->input('acknowledgment');
    $paper->references = $request->input('references');

    if($request->hasFile('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('submit_paper/'), $filename);
        $paper->image= $filename;
}


//     if ($request->hasFile('image')) {
//       $image = $request->file('image');
//       $imageName = $image->getClientOriginalName();
//       $imagePath = $image->storeAs('public/images/submit_paper', $imageName);
//       $paper->image = $imagePath;
//   }
    // Assign other fields similarly

    // Save the paper
    $paper->save();

    $user = auth()->user();
    $data = $request->all();

     author_email::create([
        'user_id' => $user->id,
        'to' => $user->email,
        'subject' => 'Menuscript Submitted',
        'from' => 'temporary9794@gmail.com',
        'body' => view('emails.menuscript-submitted', ['data' => $data])->render(),
    ]);

  Mail::send('emails.menuscript-submitted', ['data' => $data], function ($message) use ($user) {
        $message->to($user->email)
            ->subject('Menuscript Submitted');
        $message->from('temporary9794@gmail.com', 'Journal');
    });


    // Return a success message
    return redirect()->route('added_menuscript')->with(['success','Paper submitted successfully']);
}

public function update_paper()
{
    dd(1);
}
}
