<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends User
{
    use HasFactory, SoftDeletes;

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

    public function strands()
    {
        return $this->hasMany(Strand::class);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
