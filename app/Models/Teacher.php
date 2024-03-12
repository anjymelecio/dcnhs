<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'lastname',
        'firstname',
        'middlename',
        'sex',
        'status',
        'birth_place',
        'date_birth',
        'email',
        'phone_number',
        'house_number',
        'street',
        'brgy',
        'city',
        'state',
        'zip_code',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teacher) {
            $teacher->teacher_id = bcrypt($teacher->teacher_id);
        });
    }
}
