<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{

    public function exam_type()
    {
        return $this->belongsTo(Exam_type::class, 'exam_type_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

}
