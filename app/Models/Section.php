<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

   protected $fillable = ['section_name', 'strand_id', 'teacher_id', 'grade_level_id', 'school_year_id'];

    use HasFactory;

    public function students() {

        return $this->hasMany(Student::class);
    }
    
    public function strand(){
     return $this->belongsTo(Strand::class, 'strand_id');
    }
  
    public function classes(){

        return $this->hasMany(Classes::class);
    }

    public function teacher(){

        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function gradeLevel(){

        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    
 
}
