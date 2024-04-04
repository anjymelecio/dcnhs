<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function index(Request $request)
    {
        $strands = Strand::select('id', 'strands')->get();

        $request->validate([
            'strand_id' => 'exists:strands,id'
        ], [
            'strand_id.exists' => 'The selected strand is invalid.'
        ]);

  
            $strandSub = DB::table('strand_subjects')
                ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
                ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
                ->select('subjects.subject_name as subject', 'subjects.id as id')
                ->orderBy('subject_name')
                ->where('strands.id', $request->strand_id)
                ->get();


                $sections = Section::select('sections.section_name as section', 'sections.id as id')
                ->join('strands','strands.id',  '=', 'sections.strand_id')
                ->where('strands.id', $request->strand_id)
                ->get();

                $teachers = Teacher::select('firstname', 'lastname', 'teacher_id', 'id')
                ->get();


                $semesters = Semester::select('semester',  'id')
                ->where('status', 'active')
                ->orderBy('semester')
                ->get();


                $gradeLevel = GradeLevel::select('level', 'id')
                ->get();

        
        $email = Auth::user()->email;

        return view('admin.classes', compact('email', 'strands', 'strandSub', 'sections', 'teachers', 'semesters', 'gradeLevel'));
    }
}
