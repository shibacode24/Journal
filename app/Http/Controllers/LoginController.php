<?php

namespace App\Http\Controllers;

use App\Models\author\author_email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function create_account()
    {              
        return view('website.create_account');
    }
    public function store(Request $request)
{
// dd($request->all());
    // Define custom validation rule for matching passwords
    Validator::extend('password_match', function ($attribute, $value, $parameters, $validator) {
        return $value === $validator->getData()['password'];
    });

    // Define custom validation error messages
    $messages = [
        'password_match' => 'The :attribute must match the password.',
    ];

    // Validate the form data
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
        'affiliation' => 'required|string',
        'retypepassword' => 'required|string|password_match',
    ], $messages);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        // return redirect()->back()->with('error', $validator);
        // return redirect()->back()->with('error', $validator->messages());
    }

    // Create a new User instance
    $create_account = new User();
    $create_account->role = 'user';
    $create_account->first_name = $request->input('firstname');
    $create_account->last_name = $request->input('lastname');
    $create_account->email = $request->input('email');
    $create_account->role = $request->input('role');
    $create_account->affiliation = $request->input('affiliation');
    $create_account->password = Hash::make($request->input('password'));
    $create_account->plain_password = $request->input('password');
    $create_account->re_password = Hash::make($request->input('retypepassword'));
    $create_account->re_plain_password = $request->input('retypepassword');
    
    // Save the user
    $create_account->save();

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
    return redirect()->route('create_account')->with('success', 'Account created successfully!');
}
    

public function login()
{              
    return view('login');
}

public function check_login(Request $request)
{
    
    if (Auth::attempt(['email' =>$request->email, 'password' => $request->password,'status' => "0"]))
    {
        if(Auth::user()->role == "admin")
        {
           
            return redirect()->route('admin_dashboard');
        }

            else if(Auth::user()->role == "editor" )
            {
    
                return redirect()->route('editor_dashboard');
            }
        
            else if(Auth::user()->role == "reviewer" )
             {
             
                return redirect()->route('reviewer_dashboard');
            }
            
           else if(Auth::user()->role == "author" )
           {
            return redirect()->route('author_dashboard');
            }
        
            
        //    else if($user_role->role_name=="Technical Head" )
        //    {
        //     return redirect()->route('TD.th_dashboard');
        //    }
      
        // return redirect()->route('dashboard');

    }
        else
        {
            return redirect()->route('login');

        }
        
    
}
public function log_out()
{
   Auth::logout();
  return redirect()->route('login');
}

}
