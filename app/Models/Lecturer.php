<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses()
    {
        return $this->hasMany(LecturerCourse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dashboardLecturer()
    {
        return Course::all()->take(5);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class)->orderBy('id', 'DESC');
    }

    public function unread_notifications()
    {
        return $this->notifications()->where('status', 0);
    }
}
