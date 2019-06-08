<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Semester_term extends Model
{
    protected $guarded = [];

    public function batches()
    {
        return $this->hasMany(Batch::class, 'term_id');
    }
}
