<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['strands', 'description'];

    

    

    public function subjects(){
         return $this->hasMany(Subject::class);
    }


   

   public function section(){


    return $this->hasOne(Section::class);



    }

    public function strandsub(){

        return $this->hasMany(StrandSubject::class);
    }
    
}
