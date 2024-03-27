<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Strand extends Model
{
    use HasFactory;

    protected $fillable = ['strands', 'description'];

    

    

    public function subjects(){
         return $this->hasMany(Subject::class);
    }


    public function strandSubject(){

        return $this->hasMany(Subject::class);
    }

    
}
