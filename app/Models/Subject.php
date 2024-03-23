<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [

        'subject_name',
        'strand_id',
        'semester',
        'grade_level'
    ];

    public function strand(){

        return $this->belongsTo(Strand::class, 'strand_id');
    }

   
    

  
}
