<?php

namespace App\Academics;

use App\Students\Student;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $guarded = [];

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
