<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $guarded = [];

    public function batches()
    {
        return $this->hasMany(Batch::class, 'course_id');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }


}
