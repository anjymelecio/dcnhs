<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller


   
{


public function index(){
    if(auth()->check()){

             return redirect('/admin/dashboard');

    }

    return response()
    ->view('admin.login')
    ->header('Cache-control', 'no-store', 'no-cache', 'must-revalidate', 'max-age-0');
}
    public function adminLogin(Request $request){


        $incomingFields = $request->validate([

            'email' => 'required|email',
            'password'=> 'required'


        ],

        [

        'email.required' => 'Please enter an email',
        'email.email' => 'Please enter a valid email',
        'password.required'=> 'Please enter a password'


        ]
    
    );

        if(auth()->attempt([
            'email'=> $incomingFields['email'],
            'password'=> $incomingFields['password']
        ])){

        $request->session()->regenerate();
        return redirect('/admin/dashboard')
        ->with('Success', 'Welcome user');

        }

        return redirect('/')
        ->withInput($request->only('email'))
        ->withErrors(['loginError'=> 'Incorrect Email or Password. ']);

        return view('admin.login');

       
    }

    public function adminDashboard(){

      return view('admin.dashboard');

    }

    public function adminLogout(){
       
        auth()->logout();

        return redirect('/');
        
    }
}
