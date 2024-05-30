<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\StudentGuardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentGuardianController extends Controller
{
   public function index(Request $request, $id)
   {
       $guardian = Guardian::find($id);

       if (!$guardian) {
           abort(404, 'Guardian not found');
       }

       $email = Auth::user()->email;

       $studentsQuery = DB::table('students')
           ->select('id', 'firstname', 'lastname', 'lrn', DB::raw('SUBSTRING(middlename, 1, 1) as middle_initial'))
           ->orderBy('lastname');

       if ($request->has('lrn') && $request->input('lrn') !== null) {
           $lrn = $request->input('lrn');
           $studentsQuery->where('lrn', 'like', "%{$lrn}%");
       }

       $students = $studentsQuery->get();

       $guardianStuds = StudentGuardian::join('students', 'students.id', '=', 'student_guardians.student_id')
           ->where('student_guardians.guardian_id', $id)
           ->select('students.id as student_id', 'students.firstname as firstname',
            'students.lastname as lastname', 'students.lrn as lrn', DB::raw('SUBSTRING(students.middlename, 1, 1) as middle_initial'))
            ->where('students.deleted_at', null)
           ->get();

       return view('admin.studentguardian', compact('students', 'guardian', 'email', 'guardianStuds'));
   }


   public function addStudent(Request $request, $id)
{
    $guardian = Guardian::find($id);

    $validatedData = $request->validate([
        'student_id' => 'required|array|min:1',
        'student_id.*' => 'exists:students,id', // Validate each student_id individually and check if it exists in the 'students' table
    ], [
        'student_id.*.exists' => 'One or more selected students do not exist.', // Custom error message for the 'exists' rule
    ]);

    foreach ($request->student_id as $studentId) {
      
        $existingStudent = StudentGuardian::where('guardian_id', $id)
            ->where('student_id', $studentId)
            ->exists();

        if ($existingStudent) {
            return redirect()->back()->withErrors('Student already exists for this guardian.');
        }


        $studentGuardian = new StudentGuardian();
        $studentGuardian->guardian_id = $guardian->id;
        $studentGuardian->student_id = $studentId;
        $studentGuardian->save();
    }

    return redirect()->back()->with('success', 'Students successfully added to the guardian.');
}
 public function studentList($id){

    $email = Auth::user()->email;

    $guardian = Guardian::find($id);

    if (!$guardian) {
        abort(404, 'Guardian not found');
    }

    $guardianStuds = StudentGuardian::join('students', 'students.id', '=', 'student_guardians.student_id')
    ->where('student_guardians.guardian_id', $id)
    ->select('students.id as student_id', 'students.firstname as firstname',
     'students.lastname as lastname', 'students.lrn as lrn', DB::raw('SUBSTRING(students.middlename, 1, 1) as middle_initial', 
), 'student_guardians.id as id')
->whereNull('students.deleted_at')
    ->get();

    return view('admin.guardianstudentlist', compact('guardianStuds', 'email', 'guardian'));
 }

 public function delete($id){
    $studentGuardian = StudentGuardian::find($id);
    if(!$studentGuardian){
        abort(404, 'Guardian not found');
    }
    $studentGuardian->delete();
    return redirect()->back()->with('success', 'Student successfully deleted');
}

    }

