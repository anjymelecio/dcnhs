<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //

    public function index(){
        $email = Auth::user()->email;

        $subjects = Subject::select('id', 'subjects', 'written_works', 'performance_task', 'assessment')
        ->orderBy('subjects')
        ->get();


        return view('admin.subjects', compact('email', 'subjects'));
    }

    public function create(Request $request){

          $validatedData = $request->validate([
       'subjects' => 'required|string|max:255',
        'written_works' => 'required|numeric',
        'performance_task' => 'required|numeric',
        'assessment' => 'required|numeric',

    ], [
    
  'subjects.required' => 'The subject name is required.',
    'subjects.string' => 'The subject name must be a string.',
    'subjects.max' => 'The subject name may not be greater than :max characters.',
    'written_works.required' => 'The written works field is required.',
    'written_works.numeric' => 'The written works must be a number.',
    'performance_task.required' => 'The performance task field is required.',
    'performance_task.numeric' => 'The performance task must be a number.',
    'assessment.required' => 'The assessment field is required.',
    'assessment.numeric' => 'The assessment must be a number.',
    
    ]);
    $total = $validatedData['written_works'] + $validatedData['performance_task'] + $validatedData['assessment'];

    if($total >= 101){

    return redirect()->back()->withErrors('The grading total are not valid');


 



    }
        Subject::create($validatedData);

        return redirect()->back()->with('success', 'Subject successfully created');

        
    }

    public function update(Request $request, $id){
        

        $subjects = Subject::find($id);

             $validatedData = $request->validate([
       'subjects' => 'required|string|max:255',
        'written_works' => 'required|numeric',
        'performance_task' => 'required|numeric',
        'assessment' => 'required|numeric',

    ], [
    
  'subjects.required' => 'The subject name is required.',
    'subjects.string' => 'The subject name must be a string.',
    'subjects.max' => 'The subject name may not be greater than :max characters.',
    'written_works.required' => 'The written works field is required.',
    'written_works.numeric' => 'The written works must be a number.',
    'performance_task.required' => 'The performance task field is required.',
    'performance_task.numeric' => 'The performance task must be a number.',
    'assessment.required' => 'The assessment field is required.',
    'assessment.numeric' => 'The assessment must be a number.',
    
    ]);
    $total = $validatedData['written_works'] + $validatedData['performance_task'] + $validatedData['assessment'];

    if($total >= 101){

    return redirect()->back()->withErrors('The grading total are not valid');


 



    }
        $subjects->update( $validatedData );

        return redirect()->back()->with('success', 'Subject successfully updated');

        
    }

    public function delete($id){

        $subjects = Subject::find($id);
        $subjects->delete();

         return redirect()->back()->with('success', 'Subject successfully deleted');


    }
}
