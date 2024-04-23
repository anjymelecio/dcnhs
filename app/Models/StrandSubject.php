<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StrandSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'strand_id',
        'subject_id',
        'semester_id',
        'grade_level_id',
    ];

    public function strand(){


        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }
}
