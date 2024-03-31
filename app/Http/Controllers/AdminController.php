<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect('/admin/dashboard');
        }

        return response()
            ->view('admin.login')
            ->header('Cache-control', 'no-store, no-cache, must-revalidate, max-age=0');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ], [
            'email.required' => 'Please enter an email',
            'email.email' => 'Please enter a valid email',
            'password.required'=> 'Please enter a password'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard')->with('success', 'Welcome user');
        }

        return redirect('/')
            ->withInput($request->only('email'))
            ->withErrors(['loginError'=> 'Incorrect Email or Password.']);
    }

    public function adminDashboard()
    {
        $email = Auth::user()->email;
        return view('admin.dashboard', compact('email'));
    }

    public function adminLogout()
    {
        auth()->logout();
        return redirect('/');
    }
       public function addStudents(){
      
       }
     
     public function addSection(Request $request){
        $validatedData = $request->validate([
             'section_name' => ['required', 'max:255' , 'unique:sections,section_name']
 
        ],
 
             [
     'section_name.required' => 'The section name is required.',
     'section_name.max' => 'The section name must not exceed 255 characters.'
 ],
      
        );
           Section::create($validatedData);
      
        return redirect()->back()->with('success', 'Section successfully created');
     }


     
     public function updateSection(Request $request, $id){
             
          $section = Section::find($id);
 
          $request->validate([
          
              'section_name' => ['required', 'max:255' , 'unique:sections,section_name']
          ],
 
          [
 
            'strand_name.required' => 'The strand name field is required.',
             'section_id.required' => 'The section ID field is required.',
             'section_id.exists' => 'The selected section ID is invalid.',
         ]
          
          );
 
          $input = $request->all();
          $section->update($input);
           return redirect()->back()->with('success', 'Section update successfully');
     
     }
    

   

  
  

 
}
