<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'quarter',
        's1',
        's2',
        's3',
        's4',
        's5',
        's6',
        's7',
        's8',
        's9',
        's10',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'h7',
        'h8',
        'h9',
        'h10',
        'total_score',
        'total_highest_score'
    ];


    public function subject(){

        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student(){

        return $this->belongsTo(Student::class, 'student_id');
    }
}
