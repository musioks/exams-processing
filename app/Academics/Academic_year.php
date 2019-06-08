<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Academic_year extends Model
{
    protected $guarded = [];

    public function batches()
    {
        return $this->hasMany(Batch::class, 'academic_year_id');
    }
}
