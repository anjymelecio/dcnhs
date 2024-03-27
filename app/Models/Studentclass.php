<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'class_id'
    ];

    public function students(){
        
        return $this->belongsToMany(Student::class);
    }

    public function classes(){

        return $this->belongsTo(Classes::class, 'class_id');
    }
}
