<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Strand extends Model
{
    use HasFactory;

    protected $fillable = ['strands', 'section_id', 'teacher_id'];

    public function students(): HasMany
    
    {
         
        return $this->hasMany(Student::class);

    }

    public function section(){

          return $this->hasMany(Section::class, 'section_id');
    }

    public function teacher(){
return $this->belongsTo(Section::class, 'teacher_id');

    }
}
