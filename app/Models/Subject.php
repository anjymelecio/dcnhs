<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'subject_name',
        'strand_id',
        'semester',
        'grade_level'
    ];

    public function strand(){

        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function classes(){

        return $this->belongsTo(Classes::class);
    }

   
    

  
}
