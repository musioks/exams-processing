<?php

namespace App\Lecturers;

use App\Academics\Unit;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }
}
