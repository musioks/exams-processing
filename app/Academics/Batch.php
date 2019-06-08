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

    public function academic_year()
    {
        return $this->belongsTo(Academic_year::class, 'academic_year_id');
    }

    public function term()
    {
        return $this->belongsTo(Semester_term::class, 'term_id');
    }

    public function year_of_study()
    {
        return $this->belongsTo(Year_of_study::class, 'year_of_study_id');
    }
    public function exams()
    {
        return $this->belongsTo(Exams::class, 'batch_id');
    }

}
