<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Guardian;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Strand;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //

    public function index(){

        $email = Auth::user()->email;
      
        $guardians = Guardian::select('id', 'firstname', 'lastname')
        ->get();

        $gradeLevel = GradeLevel::select('id', 'level')
        ->get();

        $semesters = Semester::select('semester', 'id')
        ->get();
      
 
         $strands = Strand::select('id','strands')
         ->get();

         
         ;
          $years = SchoolYear::select('id', DB::raw('YEAR(date_start) as start_year'), DB::raw('YEAR(date_end) as end_year'), 'school_year_name')
            ->get();
           return view('admin.addstudent', compact('email',  'strands',
            'guardians', 'years', 'gradeLevel', 'semesters'));

        
    }

    public function create(Request $request){



     $validatedData =$request->validate([
     
              'lrn' => 'required|numeric|digits:12|unique:students,lrn',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female',
            'strand_id' => 'required|exists:strands,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
            'school_year_id' => 'required|exists:school_years,id',
            'place_birth' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'email' => 'required|email|unique:students,email',

            'street' => 'nullable|string|max:255',
            'brgy' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            
     
     
     
     ], [
              

              

                
             'lrn.required' => 'LRN is required.',
            'lrn.numeric' => 'LRN must be numeric.',
            'lrn.digits' => 'LRN must be 12 digits.',
            'lrn.unique' => 'LRN already exists.',
            'lastname.required' => 'Last name is required.',
            'lastname.max' => 'Last name may not be greater than :max characters.',
            'firstname.required' => 'First name is required.',
            'firstname.max' => 'First name may not be greater than :max characters.',
            'middlename.required' => 'Middle name is required.',
            'middlename.max' => 'Middle name may not be greater than :max characters.',
            'sex.required' => 'Sex is required.',
            'sex.in' => 'Sex must be either Male or Female.',
            'strand_id.required' => 'Strand is required.',
            'strand_id.exists' => 'Selected strand does not exist.',
            'grade_level_id.required' => 'Grade level is required.',
            'grade_level_id.exists' => 'Selected grade level does not exist.',
            'school_year_id.required' => 'School year is required.',
            'school_year_id.exists' => 'Selected school year does not exist.',
            'place_birth.required' => 'Place of birth is required.',
            'place_birth.max' => 'Place of birth may not be greater than :max characters.',
            'date_birth.required' => 'Date of birth is required.',
            'date_birth.date' => 'Date of birth must be a valid date.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email already exist. ',
            'street.max' => 'Street may not be greater than :max characters.',
            'brgy.max' => 'Barangay may not be greater than :max characters.',
            'city.max' => 'City may not be greater than :max characters.',
     
     
     ]);

   
     
     

     $validatedData['password'] = bcrypt($validatedData['lrn']); 
 

    

     Student::create($validatedData);


     return redirect()->route('students.data')->with('success', 'Student Create Successfully');





    }

  public function data(Request $request) {
    $email = Auth::user()->email;

    $datasQuery = DB::table('students')
        ->leftJoin('strands', 'strands.id', '=', 'students.strand_id')
        ->leftJoin('grade_levels', 'grade_levels.id', '=', 'students.grade_level_id')
        ->leftJoin('school_years', 'school_years.id', '=', 'students.school_year_id')
        ->leftJoin('semesters', 'semesters.id', '=', 'students.semester_id')
        ->select(
            'students.id as id',
            'students.lrn as lrn',
            'students.lastname as lastname',
            'students.firstname as firstname',
            'students.middlename as middlename',
            'students.sex as sex',
            'strands.strands as strand',
            'strands.id as strand_id',
            'grade_levels.level as level',
            'grade_levels.id as level_id',
            DB::raw('YEAR(school_years.date_start) as year_start'),
            DB::raw('YEAR(school_years.date_end) as year_end'),
            'school_years.id as school_year_id',
            'students.place_birth as place_birth',
            'students.date_birth as date_birth',
            'students.email as email',
            'students.street as street',
            'students.brgy as brgy',
            'students.city as city',
            'semesters.id as semester_id'
        )
        ->whereNull('students.deleted_at')
        ->orderBy('lastname');

    if ($request->has('lrn')) {
        $lrn = $request->input('lrn');
        $datasQuery->where('students.lrn', 'like', '%' . $lrn . '%');
    }

    if ($request->has('strand_id') && $request->input('strand_id') != '') {
        $strandId = $request->input('strand_id');
        $datasQuery->where('students.strand_id', $strandId);
    }

    if ($request->has('grade_level_id') && $request->input('grade_level_id') != '') {
        $gradeLevelId = $request->input('grade_level_id');
        $datasQuery->where('students.grade_level_id', $gradeLevelId);
    }

    $datas = $datasQuery->paginate(10);

    $guardians = Guardian::select('id', 'firstname', 'lastname')->get();
    $gradeLevel = GradeLevel::select('id', 'level')->get();
    $strands = Strand::select('id','strands')->get();
    $semesters = Semester::select('semester', 'id', 'status')->get();
    $years = SchoolYear::select('id', DB::raw('YEAR(date_start) as start_year'), DB::raw('YEAR(date_end) as end_year'), 'school_year_name')->get();

    return view('data.students', compact('email', 'datas', 'gradeLevel', 'strands', 'years', 'semesters'));
}


    public function update(Request $request ,$id){

        $data = Student::find($id);

       $validatedData = $request->validate([
    'lrn' => 'required|numeric|digits:12|unique:students,lrn,' . $id,
    'lastname' => 'required|string|max:255',
    'firstname' => 'required|string|max:255',
    'middlename' => 'required|string|max:255',
    'sex' => 'required|in:Male,Female',
    'strand_id' => 'required|exists:strands,id',
    'grade_level_id' => 'required|exists:grade_levels,id',
    'school_year_id' => 'required|exists:school_years,id',
    'place_birth' => 'required|string|max:255',
    'date_birth' => 'required|date',
    'email' => 'required|email|unique:students,email,' . $id,
    'street' => 'nullable|string|max:255',
    'brgy' => 'nullable|string|max:255',
    'city' => 'nullable|string|max:255',
    'semester_id' => [
            'nullable', 
            Rule::exists('semesters', 'id'), 
        ],
],
 [
            

            

              
           'lrn.required' => 'LRN is required.',
          'lrn.numeric' => 'LRN must be numeric.',
          'lrn.digits' => 'LRN must be 12 digits.',
          'lrn.unique' => 'LRN already exists.',
          'lastname.required' => 'Last name is required.',
          'lastname.max' => 'Last name may not be greater than :max characters.',
          'firstname.required' => 'First name is required.',
          'firstname.max' => 'First name may not be greater than :max characters.',
          'middlename.required' => 'Middle name is required.',
          'middlename.max' => 'Middle name may not be greater than :max characters.',
          'sex.required' => 'Sex is required.',
          'sex.in' => 'Sex must be either Male or Female.',
          'strand_id.required' => 'Strand is required.',
          'strand_id.exists' => 'Selected strand does not exist.',
          'grade_level_id.required' => 'Grade level is required.',
          'grade_level_id.exists' => 'Selected grade level does not exist.',
          'school_year_id.required' => 'School year is required.',
          'school_year_id.exists' => 'Selected school year does not exist.',
          'place_birth.required' => 'Place of birth is required.',
          'place_birth.max' => 'Place of birth may not be greater than :max characters.',
          'date_birth.required' => 'Date of birth is required.',
          'date_birth.date' => 'Date of birth must be a valid date.',
          'email.required' => 'Email is required.',
          'email.email' => 'Email must be a valid email address.',
          'email.unique' => 'Email already exist. ',
          'street.max' => 'Street may not be greater than :max characters.',
          'brgy.max' => 'Barangay may not be greater than :max characters.',
          'city.max' => 'City may not be greater than :max characters.',
   
   
   ]);

   $validatedData['password'] = bcrypt($validatedData['lrn']); 

   $data->update($validatedData);

return redirect()->back()->with('success', 'Student successfully updated');




    }

    public function delete($id){

    $data = Student::find($id);

    $data->delete();


    return redirect()->back()->with('success', 'Student successfully delete');




    }


    public function archive(){

     $email = Auth::user()->email;

    $datas = DB::table('students')
    ->join('strands', 'strands.id', '=', 'students.strand_id')
    ->join('grade_levels', 'grade_levels.id', '=', 'students.grade_level_id')
    ->join('school_years', 'school_years.id', '=', 'students.school_year_id')
    ->select( 'students.id as id',
              'students.lrn as lrn',
              'students.lastname as lastname', 
              'students.firstname as firstname', 
              'students.middlename as middlename',
              'students.sex as sex', 
              'strands.strands as strand', 
              'strands.id as strand_id',
              'grade_levels.level as level', 
              'grade_levels.id as level_id', 
              DB::raw('YEAR(school_years.date_start) as year_start'),
              DB::raw('YEAR(school_years.date_end) as year_end'),
              'school_years.id as school_year_id', 
              'students.place_birth as place_birth',
              'students.date_birth as date_birth',
              'students.email as email', 
              'students.street as street', 
              'students.brgy as brgy', 
              'students.city as city')
              ->whereNotNull('students.deleted_at')
    ->get();

      return view('deleted.students', compact('email', 'datas'));



    }

    public function restore($id){

    $student = Student::withTrashed()->find($id);

    $student->restore();

    return redirect()->back()->with('success', 'Student successfully restore');


    }
}
