<?php

namespace App\Academics;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    //
    protected $guarded = [];

    public function batches(){
        return $this->belongsToMany(Batch::class);
    }
}
