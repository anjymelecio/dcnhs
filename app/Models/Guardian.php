<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'middlename',
        'firstname',
        'relationship',
        'phone',
        'occupation',
        'place_of_birth',
        'birth_date',
        'email',
        'password',
        'house_number',
        'street',
        'barangay',
        'city',
        'state',
        'zip_code',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function($guardian){
              $guardian->password = Hash::make('password1234');
        });
    }
}
