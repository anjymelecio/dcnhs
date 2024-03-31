<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrandSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'strand_id',
        'grade_level_id',
        'semester'
    ];

    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'subject_id');
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'strand_subjects', 'strand_id', 'subject_id')
            ->withPivot('grade_level_id', 'semester');
    }
}
