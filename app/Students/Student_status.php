<?php

namespace App\Students;

use Illuminate\Database\Eloquent\Model;

class Student_status extends Model
{
    protected $guarded=[];

    public function students()
    {
        return $this->hasMany(Student::class,'status_id');
    }
}
