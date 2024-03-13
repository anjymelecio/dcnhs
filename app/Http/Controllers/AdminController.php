<?php

namespace App\Http\Controllers;

use App\Models\Guardian;

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
       $email = Auth::user()->email;
          return view('admin.addstudent', compact('email'));
       }
        public function addData(){
       $email = Auth::user()->email;
          return view('admin.add', compact('email'));
       }
    public function addParents()
    {
        $email = Auth::user()->email;
        return view('admin.addparents', compact('email'));
    }

    public function addParentsPost(Request $request)
    {
        $validatedData = $request->validate([
            'lastname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'phone' => 'nullable|numeric|digits_between:10,15',
            'occupation' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'house_number' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
        ]);
       
        Guardian::create($validatedData);

        return redirect()->back()->with('success', 'Parent form successfully created');
    }
}
