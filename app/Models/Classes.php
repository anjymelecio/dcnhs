<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'section_id',
        'day',
        'time_start',
        'time_end',
        'strand_id',
    ];


    public function teacher(){

        return $this->hasMany(Teacher::class, 'teacher_id');
    }

    public function subject(){

        return $this->belongsToMany(Subject::class, 'subject_id');
    }
}
