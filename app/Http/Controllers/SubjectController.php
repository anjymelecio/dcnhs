<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Strand;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //

    public function index(){

        $email = Auth::user()->email;

        $strands = Strand::select('strands', 'description', 'id')
        ->get();
        $sections = Section::select('section_name', 'id')
        ->get();

        $teachers = Teacher::select('lastname', 'firstname', 'id')
        ->get();

        return view('admin.strand', compact('email', 'strands', 'sections', 'teachers') );
    }


    public function addSubject($id){


        $strands = Strand::find($id);
       
      
       
          
          $ElevenFirstSemesters = Subject::select('subject_name', 'semester', 'grade_level' ,'id')
          ->where('semester', '1st Semester')
          ->where('grade_level', '11')
           ->where('strand_id', $id)
           ->orderBy('subject_name', 'asc')
          ->get();


            $ElevenSecondSemester = Subject::select('subject_name', 'semester', 'grade_level', 'id')
          ->where('semester', '2nd Semester')
          ->where('grade_level', '11')
          ->where('strand_id', $id)
          ->orderBy('subject_name', 'asc')
          ->get();


               $TwelveFirstSemester = Subject::select('subject_name', 'semester', 'grade_level', 'id')
          ->where('semester', '1st Semester')
          ->where('grade_level', '12')
          ->where('strand_id', $id)
          ->orderBy('subject_name', 'asc')
          ->get();

          $TwelveSecondSemester = Subject::select('subject_name', 'semester', 'grade_level', 'id')
          ->where('semester', '2nd Semester')
          ->where('grade_level', '12')
          ->where('strand_id', $id)
          ->orderBy('subject_name', 'asc')
          ->get();

        $email = Auth::user()->email;


       

      return view('strands.strand', compact('email', 'strands', 
      'ElevenFirstSemesters',
       'ElevenSecondSemester',
       'TwelveFirstSemester',
       'TwelveSecondSemester'
         ));


    }

    public function addSubjectPost(Request $request, $id){



    

        $validateData = $request->validate([
            'subject_name' => 'required|string|max:255|unique:subjects,subject_name,NULL,id,strand_id,' . $request->input('strand_id'),
           'strand_id' => 'required|exists:strands,id',
           'semester' => 'required|in:1st Semester,2nd Semester', 
            'grade_level' => 'required|in:11,12', 


        ],

        [
            'subject_name.unique' => 'The subject name has already been taken for this strand.',
            'subject_name.required' => 'The subject name field is required.',
        'subject_name.string' => 'The subject name must be a string.',
        'subject_name.max' => 'The subject name may not be greater than :max characters.',
        'strand_id.required' => 'The strand ID field is required.',
        'strand_id.exists' => 'The selected strand ID is invalid.',
        ]

        
    
    );

        Subject::create($validateData);
        return redirect()->back()->with('success', 'Subject Added Succesfully')->withInput($validateData);

    }

    public function edit($strand_id, $subject_id){

    $email = Auth::user()->email;

    $strands = Strand::find($strand_id);
    $subject = Subject::where('strand_id', $strand_id)
    ->find($subject_id);

      
          $ElevenFirstSemesters = Subject::select('subject_name', 'semester', 'grade_level' ,'id')
          ->where('semester', '1st Semester')
          ->where('grade_level', '11')
           ->where('strand_id', $strand_id)
           ->orderBy('subject_name', 'asc')
          ->get();


            $ElevenSecondSemester = Subject::select('subject_name', 'semester', 'grade_level', 'id')
          ->where('semester', '2nd Semester')
          ->where('grade_level', '11')
          ->where('strand_id', $strand_id)
          ->orderBy('subject_name', 'asc')
          ->get();


               $TwelveFirstSemester = Subject::select('subject_name', 'semester', 'grade_level', 'id')
          ->where('semester', '1st Semester')
          ->where('grade_level', '12')
          ->where('strand_id', $strand_id)
          ->orderBy('subject_name', 'asc')
          ->get();

          $TwelveSecondSemester = Subject::select('subject_name', 'semester', 'grade_level', 'id')
          ->where('semester', '2nd Semester')
          ->where('grade_level', '12')
          ->where('strand_id', $strand_id)
          ->orderBy('subject_name', 'asc')
          ->get();

    return view('edit.subject' , compact('subject', 'strands', 'email',
    
     'ElevenFirstSemesters',
       'ElevenSecondSemester',
       'TwelveFirstSemester',
       'TwelveSecondSemester'));


    }

    public function update(Request $request, $strand_id, $subject_id){

        $validatedData = $request->validate([
        'subject_name' => 'required|string|max:255|unique:subjects,subject_name,' . $subject_id . ',id,strand_id,' . $strand_id,
        'semester' => 'required|in:1st Semester,2nd Semester',
        'grade_level' => 'required|in:11,12',
    ], [
        'subject_name.unique' => 'The subject name has already been taken for this strand.',
        'subject_name.required' => 'The subject name field is required.',
        'subject_name.string' => 'The subject name must be a string.',
        'subject_name.max' => 'The subject name may not be greater than :max characters.',
    ]);

    // Find the subject to update
    $subject = Subject::findOrFail($subject_id);


    $subject->update([
        'subject_name' => $validatedData['subject_name'],
        'semester' => $validatedData['semester'],
        'grade_level' => $validatedData['grade_level'],
    ]);


    return redirect()->back()->with('success', 'Subject updated successfully');

    }
    
}
