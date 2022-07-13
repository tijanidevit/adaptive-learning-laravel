<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function materials()
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function lecturers()
    {
        return $this->hasMany(LecturerCourse::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function group()
    {
        return $this->hasOne(Group::class);
    }
}
