<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'level'
    ];


    public function students(){

        return $this->belongsTo(Student::class);
    }
   

      public function classes(){

        return $this->belongsTo(Classes::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }


}
