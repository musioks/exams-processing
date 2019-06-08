<?php

namespace App\Academics;

use App\Students\Student;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exams::class, 'exam_id');
    }
}
