<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\author\author_email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EditorController extends Controller
{
    public function editor()
    {              
        $editor =User::where('role','editor')->get();
        return view('admin.add_editor',compact('editor'));
    }
    public function create_editor(Request $request)
{
 
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'affiliation' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create a new User instance
    $editor = new User();
    $editor->role = 'editor';
    $editor->first_name = $request->input('firstname');
    $editor->last_name = $request->input('lastname');
    $editor->email = $request->input('email');
    $editor->affiliation = $request->input('affiliation');
    $editor->password = Hash::make($request->input('password'));
    $editor->plain_password = $request->input('password');
    
    // Save the user
    $editor->save();

    $user = $request->input('email');
    $data = $request->all();


     author_email::create([
        'to' => $request->email,
        'subject' => 'Welcome Message',
        'from' => 'temporary9794@gmail.com',
        'body' => view('emails.welcome_mail', ['data' => $data])->render(),
    ]);

  Mail::send('emails.welcome_mail', ['data' => $data], function ($message) use ($user) {
        $message->to($user)
            ->subject('Welcome Message');
        $message->from('temporary9794@gmail.com', 'Journal');
    });

    // Redirect with success message
    return redirect()->route('editor')->with('success', 'Editor created successfully!');
}


public function edit_editor(Request $request)
{
    $edit_editor = User:: where('id',$request->id)->first();
    // $editor =User::where('role','editor')->get();
    return view('admin.edit_editor',compact('edit_editor'));
}

public function update_editor(Request $request)
{

    // Create a new User instance
    $editor = User:: where('id',$request->id)->first();
    $editor->role = 'editor';
    $editor->first_name = $request->input('firstname');
    $editor->last_name = $request->input('lastname');
    $editor->affiliation = $request->input('affiliation');
    $editor->email = $request->input('email');
    $editor->password = Hash::make($request->input('password')) ?? $editor->password;
    $editor->plain_password = $request->input('password') ?? $editor->password;
    
    // Save the user
    $editor->save();

    // Redirect with success message
    return redirect()->route('editor')->with('success', 'Editor updated successfully!');
}

}
