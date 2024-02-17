<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function addData(){

        return view('admin.add');
    }

    public function addAdmin(){

        return view('admin.admin-add');
    }

public function addPost(Request $request){

    $validatedData = $request->validate([
        'name' => 'required|max:255|string',
        'email' => 'required|email|unique:users|string',
        'password' => 'required|min:8|string|confirmed'
    ]);

    // Hashing the password correctly
    $validatedData['password'] = bcrypt($request->password);


       User::create($validatedData);

    return back()->with('success', 'Admin successfully created');

}




}
