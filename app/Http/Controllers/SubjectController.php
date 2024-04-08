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

        $subjects = Subject::select('id', 'subjects')
        ->orderBy('subjects')
        ->get();


        return view('admin.subjects', compact('email', 'subjects'));
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'subjects' => 'required|string|max:255|unique:subjects,subjects', 
        ], [
            'subjects.required' => 'The subject field is required.',
            'subjects.string' => 'The subject must be a string.',
            'subjects.max' => 'The subject may not be greater than :max characters.',
        
        ]);

        Subject::create($validatedData);

        return redirect()->back()->with('success', 'Subject successfully created');

        
    }

    public function update(Request $request, $id){
        

        $subjects = Subject::find($id);

        $validatedData = $request->validate([
            'subjects' => 'required|string|max:255|unique:subjects,subjects,' . $id, 
        ], [
            'subjects.required' => 'The subject field is required.',
            'subjects.string' => 'The subject must be a string.',
            'subjects.max' => 'The subject may not be greater than :max characters.',
        
        ]);

        $subjects->update( $validatedData );

        return redirect()->back()->with('success', 'Subject successfully updated');

        
    }

    public function delete($id){

        $subjects = Subject::find($id);
        $subjects->delete();

         return redirect()->back()->with('success', 'Subject successfully deleted');


    }
}
