<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Guardian;
use Illuminate\Support\Facades\Auth;


class AlluserController extends Controller
{
    //

 

    public function index(){
   
        $email = Auth::user()->email;
      
    
        $users = [];

        

        $admins = User::all();
        foreach ($admins as $admin) {
            $users[] = [
                'id' => $admin->id,
                'firstname' => $admin->name,
                'lastnames' => null,
                'middlename' => null,
                
                'role' => 'admin'
            ];
        }

        $students = Student::all();
        foreach ($students as $student) {
            $users[] = [
                'id' => $student->id,
                'firstname' => $student->firstname,
                'lastnames' => $student->lastname,
                'middlename' => $student->middlename,
                'firstname' => $student->middlename,
                'role' => 'student'
            ];
        }

        $teachers = Teacher::all();
        foreach ($teachers as $teacher) {
            $users[] = [
                'id' => $teacher->id,
                'firstname' => $teacher->firstname,
                'lastnames' => $teacher->lastname,
                'middlename' => $teacher->middlename,
                'role' => 'teacher'
            ];
        }

        $guardians = Guardian::all();
        foreach ($guardians as $guardian) {
            $users[] = [
                'id' => $guardian->id,
                'firstname' => $guardian->firstname,
                'lastnames' => $guardian->lastname,
                'middlename' => $guardian->middlename,
                'role' => 'guardian'
            ];
        }

        return view('admin.allusers', compact('users', 'email'));
    }
}
