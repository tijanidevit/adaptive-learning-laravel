<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    /////////////////////////////////////////////
    ////////////////////////////////////////////
    //NOT NEEDED AGAIN

    use HasFactory;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function chats()
    {
        return $this->hasMany(GroupChat::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
