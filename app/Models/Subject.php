<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'subjects',
        'written_works',
        'performance_task',
        'assessment',
        
        
       
    ];

   

  public function strandsub(){

        return $this->belongsTo(StrandSubject::class);
    }
   
 





   public function classes()
    {
        return $this->hasMany(Classes::class);
    }
  
}
