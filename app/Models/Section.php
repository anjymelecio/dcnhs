<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

   protected $fillable = ['section_name'];

    use HasFactory;

    public function students() {

        return $this->hasMany(Student::class);
    }
    
    public function strand(){
     return $this->belongsTo(Strand::class);
    }
  
    public function classes(){

        return $this->hasMany(Classes::class);
    }
   
}
