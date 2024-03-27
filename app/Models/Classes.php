<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'day',
        'semester_id',
        'section_id',
        
    ];


    public function teacher(){

        return $this->hasMany(Teacher::class, 'teacher_id');
    }

    public function subject(){

        return $this->belongsToMany(Subject::class, 'subject_id');
    }

    public function studentclass(){

    return $this->belongsTo(Student::class);

    }

    public function semester(){

      return $this->belongsTo(Semester::class);

    }
}
