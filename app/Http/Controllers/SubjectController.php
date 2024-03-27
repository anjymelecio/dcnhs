<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $subjects = Subject::select('subject_name', 'id')
        ->whereNull('deleted_at')
        ->get();
        return view('admin.subject', compact('email', 'subjects'));
    }

  

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject_name' => 'required|max:255|unique:subjects,subject_name,' . $id,
        ], [
            'subject_name.required' => 'Subject field is required.', 
            'subject_name.max' => 'Subject name must not exceed 255 characters.'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validatedData);

        return redirect()->back()->with('success', 'Subject Succesfully update');
    }

    public function addSubjectPost(Request $request)
    {
        $validatedData = $request->validate([
            'subject_name' => 'required|max:255|unique:subjects,subject_name'
        ], [
            'subject_name.required' => 'Subject field is required.', 
            'subject_name.max' => 'Subject name must not exceed 255 characters.'
        ]);

        Subject::create($validatedData);

        return redirect()->back()->with('success', 'Subject successfully added');
    }

    public function delete($id){

        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->back()->with('success', 'Subject successfully deleted');





    }
}
