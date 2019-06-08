<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Exam_type extends Model
{
    protected $guarded=[];

    public function exams()
    {
        return $this->belongsTo(Exams::class, 'exam_type_id');
    }
}
