<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Semester;
use App\Models\Strand;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    //

    public function index($id){

        $email = Auth::user()->email;

        $strand = Strand::find($id);


        $gradeLevels = GradeLevel::select('level', 'id')
        ->get();

            $semesters = Semester::select('semester', 'id')
            ->where('status', 'active')
            ->get();

            $subjects = DB::table('subjects')
    ->join('grade_levels', 'grade_levels.id', '=', 'subjects.grade_level_id')
    ->join('semesters', 'semesters.id', '=' , 'subjects.semester_id' )
    ->select('subjects.subjects as subject', 'subjects.grade_level_id as grade_level_id', 
    'grade_levels.level as level', 'subjects.id as id' , 'semesters.semester as semester', 'semesters.id as semester_id')
    ->where('subjects.strand_id', $id) 
    ->whereNull('subjects.deleted_at')
    ->get();


       



       


        



       
        return view('add.subject', compact('strand', 'email', 'gradeLevels', 'subjects', 'semesters'));
        


    }

  public function create(Request $request){

    $validatedData = $request->validate([
        'strand_id' => 'required|exists:strands,id', 
        'subjects' => 'required|string|max:255',
        'semester_id' => 'required|exists:semesters,id',
        'grade_level_id' => 'required|exists:grade_levels,id', 
    ], [
        'strand_id.required' => 'The strand ID field is required.',
        'strand_id.exists' => 'The selected strand ID is invalid.',
        'subjects.required' => 'The subject field is required.',
        'subjects.string' => 'The subject must be a string.',
        'subjects.max' => 'The subject may not be greater than :max characters.',
        'subjects.unique' => 'The subject has already been taken.',
        'semester_id.required' => 'The semester field is required.',
        'semester_id.exists' => 'Please select a valid semester.',
        'grade_level_id.required' => 'The grade level ID field is required.',
        'grade_level_id.exists' => 'The selected grade level ID is invalid.',
    ]);

    $subjectExist = Subject::where('subjects', $validatedData['subjects'])
                           ->where('strand_id', $validatedData['strand_id'])
                           ->where('grade_level_id', $validatedData['grade_level_id']) 
                            ->where('grade_level_id', $validatedData['semester_id']) 
                           ->first();



       if($subjectExist){



       return redirect()->back()->withErrors('Subjects already exist on this strand')
       ->withInput($validatedData);



       }                



    Subject::create($validatedData);

    return redirect()->back()->with('success', 'Subjects succesfully created on this strand')->withInput($validatedData);
    
    

    
    


    }

    public function update(Request $request, $id){

    $subjects = Subject::find($id);


    $validatedData = $request->validate([
        'strand_id' => 'required|exists:strands,id', 
        'subjects' => 'required|string|max:255',
        'semester_id' => 'required|exists:semesters,id',
        'grade_level_id' => 'required|exists:grade_levels,id', 
    ], [
        'strand_id.required' => 'The strand ID field is required.',
        'strand_id.exists' => 'The selected strand ID is invalid.',
        'subjects.required' => 'The subject field is required.',
        'subjects.string' => 'The subject must be a string.',
        'subjects.max' => 'The subject may not be greater than :max characters.',
        'subjects.unique' => 'The subject has already been taken.',
        'semester_id.required' => 'The semester field is required.',
        'semester_id.exists' => 'Please select a valid semester.',
        'grade_level_id.required' => 'The grade level ID field is required.',
        'grade_level_id.exists' => 'The selected grade level ID is invalid.',
    ]);

    $subjectExist = Subject::where('subjects', $validatedData['subjects'])
                           ->where('strand_id', $validatedData['strand_id'])
                           ->where('grade_level_id', $validatedData['grade_level_id']) 
                            ->where('grade_level_id', $validatedData['semester_id']) 
                           ->first();



       if($subjectExist){



       return redirect()->back()->withErrors('Subjects already exist on this strand')
       ->withInput($validatedData);



       }       

                   $subjects->update($validatedData);

    return redirect()->back()->with('success', 'Subjects succesfully updated on this strand')->withInput($validatedData);




    }

    public function delete($id){


     $subjects = Subject::find($id);

     $subjects->delete();


return redirect()->back()->with('success', 'Subjects succesfully deleted on this strand');

    }
}
