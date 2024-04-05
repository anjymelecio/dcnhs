<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'school_year_id',
        'status'

    ];

    public function schoolYear(){

        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
    public function classes(){

        return $this->belongsTo(Classes::class);
    }
     public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
