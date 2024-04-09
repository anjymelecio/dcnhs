<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function index()
    { 
        if(Auth::guard('teacher')->check()){
            return redirect('/teacher/dashboard');
        }
        
        return response()
            ->view('teacher.login')
            ->header('Cache-control', 'no-store, no-cache, must-revalidate, max-age=0');
    }

    public function login(Request $request)
{
    // Validating the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'The email field is required.',
        'email.email' => 'Please provide a valid email address.',
        'password.required' => 'The password field is required.',
    ]);

    // Attempting authentication with the validated data
    if (Auth::guard('teacher')->attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        return redirect('/teacher/dashboard')->with('success', 'Welcome user');
    }

    // Redirecting back with validation errors if authentication fails
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
public function dashboard(){

  

 

    return view('teacher.dashboard');
}

  public function logout(){

    Auth::guard('teacher')->logout();
    
     return redirect('/teacher/login');
  }
}
