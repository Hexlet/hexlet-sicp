<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'type',
    ];

    public function subject()
    {
        return $this->morphTo();
    }
}
