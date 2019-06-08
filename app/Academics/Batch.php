<?php

namespace App\Academics;

use App\Students\Student;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    //
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function intakes()
    {
        return $this->belongsToMany(Intake::class);
    }

}
