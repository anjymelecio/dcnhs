<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolYear extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'date_start',
        'date_end',
        'school_year_name'
    ];

    

    public function semester(){

        return $this->hasMany(Semester::class);
    }
}
