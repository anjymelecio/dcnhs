<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'password',
        'lastname',
        'firstname',
        'middlename',
        'rank',
        'sex',
        'birth_place',
        'date_birth',
        'email',
        'phone_number',
        'street',
        'brgy',
        'city',
    ];
    

    public function strand(){
          
          return $this->hasOne(Strand::class);

    }


public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function section(){


    return $this->hasOne(Section::class);



    }

    


    
 
    
}
