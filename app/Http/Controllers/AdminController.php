<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            ->withErrors(['loginError'=> 'Incorrect email or password.']);
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
       public function addAdmin(){

        $email = Auth::user()->email;


        return view('admin.admin', compact('email'));
   
       }


       public function create(Request $request){


        $validatedData = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        
        
        ],
    
     [
    'name.required' => 'The name field is required.',
    'name.string' => 'The name must be a string.',
    'name.max' => 'The name may not be greater than :max characters.',
    'email.required' => 'The email field is required.',
    'email.email' => 'The email must be a valid email address.',
    'email.unique' => 'The email has already been taken.',
    'password.required' => 'The password field is required.',
    'password.string' => 'The password must be a string.',
    'password.min' => 'The password must be at least :min characters.',
    'password.confirmed' => 'The password confirmation does not match.',
    'is_admin.required' => 'The admin role field is required.',
    'is_admin.boolean' => 'The admin role must be a boolean value.',
]);


  User::create($validatedData);

  return redirect()->back()->with('success', 'Admin succesfully created');



       }

       public function data(){

       $email = Auth::user()->email;


       $admins = User::select('id','name', 'email', 'is_admin')
       ->whereNull('deleted_at')
       ->get();




       return view('data.admin', compact('email', 'admins' ));




       }

       public function update(Request $request, $id){

       $admins = User::find($id);

       $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|string|min:8|confirmed',
        'is_admin' => 'required|boolean',
    ]);
 
      $admins->update($validatedData);

        return redirect()->back()->with('success', 'Admin succesfully updated');



       }
     
    


     
    public function delete($id){

    $admins = User::find($id);

    $admins->delete();

    return redirect()->back()->with('success', 'Admin succesfully deleted');




    }

    public function archive(){

        $email = Auth::user()->email;


       $admins = User::onlyTrashed('id','name', 'email', 'is_admin')
       ->get();

       return view('deleted.admin', compact('email', 'admins' ));


  






    }
    

   

  
  

 
}
