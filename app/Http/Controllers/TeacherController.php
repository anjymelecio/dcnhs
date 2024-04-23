<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //

    public function index(){

        $email = Auth::user()->email;

        return view('admin.teacher', compact('email'));
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'teacher_id' => 'numeric|required|digits:7|unique:teachers,teacher_id',
            'password' => 'string',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'rank' => 'required|in:Teacher I,Teacher II,Teacher III,Master Teacher I,Master Teacher II,Master Teacher III,Master Teacher IV',
            'sex' => 'required|in:Male,Female', 
            'birth_place' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => 'numeric|string|digits_between:10,15',
            'street' => 'nullable|string|max:255',
            'brgy' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            
            
                ],
              [
                
             'teacher_id.unique' => 'The teacher ID has already been taken.',
            'teacher_id.numeric' => 'The teacher ID must be a number.',
            'teacher_id.required' => 'The teacher ID field is required.',
            'teacher_id.max' => 'The teacher ID must be 7 characters.',
            'teacher_id.min' => 'The teacher ID must be 7 characters.',
            'lastname.required' => 'The lastname field is required.',
            'lastname.max' => 'The lastname may not be greater than 255 characters.',
            'firstname.required' => 'The firstname field is required.',
            'firstname.max' => 'The firstname may not be greater than 255 characters.',
            'middlename.required' => 'The middlename field is required.',
            'middlename.max' => 'The middlename may not be greater than 255 characters.',
            'rank.required' => 'Please select a rank.',
            'rank.in' => 'The selected rank is invalid.',
            'sex.required' => 'The sex field is required.',
            'sex.in' => 'The selected sex is invalid.',
            'birth_place.required' => 'The birth place field is required.',
            'birth_place.max' => 'The birth place may not be greater than 255 characters.',
            'date_birth.required' => 'The date of birth field is required.',
            'date_birth.date' => 'The date of birth must be a valid date.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'The email has already been taken.',
            'phone_number.numeric' => 'The phone number must be a number.',
            'phone_number.digits' => 'The phone number may not be greater than 15 characters.',
            'street.max' => 'The street may not be greater than 255 characters.',
            'brgy.max' => 'The barangay may not be greater than 255 characters.',
            'city.max' => 'The city may not be greater than 255 characters.',
            
        ]  );


        $validatedData['password'] = bcrypt($validatedData['teacher_id']);


        Teacher::create($validatedData);

        return redirect()->back()->with('success', 'Teacher successfully created');




    }

    public function data(Request $request){

        $email = Auth::user()->email;

        $datasQuery = Teacher::select('id', 'teacher_id', 'lastname', 'firstname', 'middlename', 'email', 'sex', 'rank',
            'birth_place', 'date_birth', 'street', 'brgy', 'city', 'phone_number')
            ->whereNull('deleted_at');
            

            if($request->has('teacher_id')){

            $teacher_id = $request->input('teacher_id');

             $datasQuery->where('teacher_id', 'like', '%' . $teacher_id. '%');
            }

            if($request->has('rank') && $request->input('rank') != ''){

            $rank = $request->input('rank');
            
            $datasQuery->where('rank', $rank);


            }

            $datas = $datasQuery->paginate(5);

        return view('data.teachers', compact('email', 'datas'));
    }

    public function update(Request $request, $id){

        $data = Teacher::find($id);


        $validatedData = $request->validate([
            'teacher_id' => 'numeric|required|digits:7|unique:teachers,teacher_id,' . $id,
            'password' => 'string',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'rank' => 'required|in:Teacher I,Teacher II,Teacher III,Master Teacher I,Master Teacher II,Master Teacher III,Master Teacher IV',
            'sex' => 'required|in:Male,Female', 
            'birth_place' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' . $data->id,
            'phone_number' => 'numeric|string|digits_between:10,15',
            'street' => 'nullable|string|max:255',
            'brgy' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            
            
                ],
              [
                
             'teacher_id.unique' => 'The teacher ID has already been taken.',
            'teacher_id.numeric' => 'The teacher ID must be a number.',
            'teacher_id.required' => 'The teacher ID field is required.',
            'teacher_id.max' => 'The teacher ID must be 7 characters.',
            'teacher_id.min' => 'The teacher ID must be 7 characters.',
            'lastname.required' => 'The lastname field is required.',
            'lastname.max' => 'The lastname may not be greater than 255 characters.',
            'firstname.required' => 'The firstname field is required.',
            'firstname.max' => 'The firstname may not be greater than 255 characters.',
            'middlename.required' => 'The middlename field is required.',
            'middlename.max' => 'The middlename may not be greater than 255 characters.',
            'rank.required' => 'Please select a rank.',
            'rank.in' => 'The selected rank is invalid.',
            'sex.required' => 'The sex field is required.',
            'sex.in' => 'The selected sex is invalid.',
            'birth_place.required' => 'The birth place field is required.',
            'birth_place.max' => 'The birth place may not be greater than 255 characters.',
            'date_birth.required' => 'The date of birth field is required.',
            'date_birth.date' => 'The date of birth must be a valid date.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'The email has already been taken.',
            'phone_number.numeric' => 'The phone number must be a number.',
            'phone_number.digits' => 'The phone number may not be greater than 15 characters.',
            'street.max' => 'The street may not be greater than 255 characters.',
            'brgy.max' => 'The barangay may not be greater than 255 characters.',
            'city.max' => 'The city may not be greater than 255 characters.',
            
        ]  );


        $validatedData['password'] = bcrypt($validatedData['teacher_id']);



        $data->update($validatedData);


        return redirect()->route('teachers.data')->with('success', 'Teacher successfully updated');




    }

    public function delete($id){

        $data = Teacher::find($id);

        $data->delete();
        return redirect()->back()->with('success', 'Teacher successfully deleted');
    }

    public function archive(){

      $email = Auth::user()->email;

        $datas = Teacher::onlyTrashed('id', 'teacher_id', 'lastname', 'firstname', 'middlename', 'email', 'sex', 'rank',
            'birth_place', 'date_birth', 'street', 'brgy', 'city', 'phone_number')
            ->whereNotNull('deleted_at')
            ->get();

            

        return view('deleted.teachers', compact('email', 'datas'));


    }

    public function restore($id){

    $teacher = Teacher::withTrashed()->find($id);


    $teacher->restore();

    return redirect()->back()->with('success', 'Teacher successfully restore');



    }
}
