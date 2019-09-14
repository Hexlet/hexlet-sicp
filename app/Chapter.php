<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Chapter extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class, 'read_chapters');
    }

    public function getIsReadAttribute()
    {
        return $this->user->where('id', Auth::user()->id)->count() > 0;
    }
}
