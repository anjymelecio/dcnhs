<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'quarter',
        'total_score',
        'total_highest_score',
        'ps',
        'ws',
    ];

    public function subject(){

        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student(){

        return $this->belongsTo(Student::class, 'student_id');
    }
}
