<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'password',
        'lastname',
        'firstname',
        'middlename',
        'rank',
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
            $teacher->password = bcrypt($teacher->password);
        });
    }

    public function strand(){
          
          return $this->hasOne(Strand::class);

    }
}
