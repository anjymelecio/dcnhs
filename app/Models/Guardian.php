<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Guardian extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        'password',
        'lastname',
        'middlename',
        'firstname',
        'phone',
        'occupation',
        'place_of_birth',
        'email',
        'birth_date',
        'street',
        'barangay',
        'city',
        'sex'
       
    ];
   

    public function students(){

        return $this->hasMany(Student::class);
    }
}
