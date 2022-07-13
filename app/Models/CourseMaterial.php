<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exam()
    {
        return $this->hasOne(Exam::class)->orderBy('id', 'ASC');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
