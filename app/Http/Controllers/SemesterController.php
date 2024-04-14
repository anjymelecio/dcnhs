<?php

namespace App\Http\Controllers;
use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SemesterController extends Controller
{
    //

    public function index(){
        $email = Auth::user()->email;

            $years = SchoolYear::select('id', DB::raw('YEAR(date_start) as start_year'), DB::raw('YEAR(date_end) as end_year'), 'school_year_name')
            ->get();

            $semesters = Semester::select('semester', 'id', 'status')->get();
            

        return view('admin.semester', compact('email', 'years', 'semesters', ));
    }

    public function create(Request $request){

     $validatedData = $request->validate([
        'semester' => 'required|string|in:1st Semester,2nd Semester',
        'school_year_id' => [
            'required',
            
        ],
    ], [
        'semester.required' => 'The semester field is required.',
        'semester.in' => 'The selected semester is invalid.',
        'semester.string' => 'The semester field must be a string.',
        'school_year_id.required' => 'The school year field is required.',
        'school_year_id.exists' => 'The selected school year is invalid.',
        'school_year_id.unique' => 'This semester already exists for the selected school year.',
    ]);
 


 Semester::create($validatedData);



 return redirect()->back()->with('success', 'Semester succefully create');





    }

    public function deactive($id){

      
        $semester = Semester::find($id);
    
        
        if($semester) {
   
            
    
        
            $semester->status = 'inactive';
    
     
            $semester->update();
            
   
            return redirect()->back()->with('success', 'This semester is now inactive');
        } else {
            
            return redirect()->back()->with('error', 'Semester not found');
        }
    }


    public function active($id){

      
        $semester = Semester::find($id);
    
        
        if($semester) {
   
            
        
            $semester->status = 'active';
    
     
            $semester->update();
            
   
            return redirect()->back()->with('success', 'This semester is now active');
        } else {
            
            return redirect()->back()->with('error', 'Semester not found');
        }
    }

    public function update(Request $request, $id){

    $semester = Semester::find($id);


    $validatedData = $request->validate([
        'semester' => 'required|string|in:1st Semester,2nd Semester',
        'school_year_id' => 'required|exists:school_years,id',
    ], [
        'semester.required' => 'The semester field is required.',
        'semester.in' => 'The selected semester is invalid.',
        'semester.string' => 'The semester field must be a string.',
        'school_year_id.required' => 'The school year field is required.',
        'school_year_id.exists' => 'The selected school year is invalid.',
    ]);

    $semester->update($validatedData);


    return redirect()->back()->with('success', 'Semester succesfully update');



  



    }

   
}