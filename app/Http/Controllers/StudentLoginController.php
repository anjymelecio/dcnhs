<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    //
    public function index()
    {
        if(Auth::guard('student')->check()) {
            return redirect('/student/dashboard');
        }
        
        return response()
            ->view('students.login')
            ->header('Cache-control', 'no-store, no-cache, must-revalidate, max-age=0');
    }
    
   public function login(Request $request)
{

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'The email field is required.',
        'email.email' => 'Please provide a valid email address.',
        'password.required' => 'The password field is required.',
    ]);

    $credentials = $request->only('email', 'password');

    $remember = $request->has('remember-me');
    if (Auth::guard('student')->attempt($credentials, $remember)) {
        $request->session()->regenerate();

         if($remember){
            $email = $request->input('email');
            $password = $request->input('password');
            setcookie('email', $email, time()+3600);
            setcookie('password', $password, time()+ 3600);



            }

        return redirect('/student/dashboard')->with('success', 'Welcome user');
    }

   return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));

}



public function dashboard(){

    return view('students.student');
}

    }

