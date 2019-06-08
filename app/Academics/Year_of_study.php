<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Year_of_study extends Model
{
    //
    protected $guarded = [];

    public function batches()
    {
        return $this->hasMany(Batch::class, 'year_of_study_id');
    }
}
