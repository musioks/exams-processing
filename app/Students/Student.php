<?php

namespace App\Students;

use App\Academics\Batch;
use App\Academics\Course;
use App\Academics\Scores;
use App\Academics\Unit;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->surname}";
    }
    public function getJoinedAtAttribute()
    {
        return date('d-M-Y', strtotime($this->created_at));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student_status()
    {
        return $this->belongsTo(Student_status::class);
    }
    public function scores()
    {
        return $this->belongsTo(Scores::class, 'student_id');
    }

}
