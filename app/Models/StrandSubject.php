<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrandSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'strand_id'
    ];


    public function subjects(){

        return $this->belongsTo(Strand::class, 'subject_id');
    }

    public function strands(){

        return $this->belongsTo(Strand::class, 'strand_id');
    }
}
