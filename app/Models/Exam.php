<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function material()
    {
        return $this->belongsTo(CourseMaterial::class);
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }
}
