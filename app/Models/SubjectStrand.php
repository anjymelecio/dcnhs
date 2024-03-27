<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectStrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'strand_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }
}
