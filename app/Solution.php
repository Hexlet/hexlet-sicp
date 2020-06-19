<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
     protected $fillable = [
        'description'
    ];

    public function completedExercise()
    {
        return $this->hasOne('App\CompletedExercise');
    }
}
