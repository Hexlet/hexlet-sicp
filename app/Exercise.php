<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exercise extends Model
{
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
