<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exams()
    {
        return $this->hasMany(StudentExam::class);
    }

    public function chats()
    {
        return $this->hasMany(GroupChat::class)->orderBy('id', 'DESC');
    }
}
