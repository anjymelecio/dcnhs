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
       
    ];

    public function strandSubject(){

     return $this->belongsToMany(StrandSubject::class);

    }

  
    public function classes(){

        return $this->belongsTo(Classes::class);
    }

   
    

  
}
