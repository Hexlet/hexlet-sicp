<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedExercise extends Model
{
    public function solution()
    {
        return $this->hasOne('App\Solution');
    }
}
