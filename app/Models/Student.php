<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
 



{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'lrn',
        'password',
        'lastname',
        'firstname',
        'middlename',
        'sex',
        'strand_id',
        'grade_level',
        'section_id',
        'year_start',
         'year_end',
        'place_birth',
        'birth_date',
        'email',
        'guardian_id',
        'house_address',
        'street',
        'brgy',
        'city',
        'state',
        'zip',
    ];
   

    public function strands(){

        return $this->belongsTo(Strand::class, 'strand_id');
    }
    public function sections(){

        return $this->hasMany(Section::class, 'section_id');
    }
    public function guardians(){

     return $this->belongsTo(Guardian::class, 'guardian_id');
    }
   

   

    
}
