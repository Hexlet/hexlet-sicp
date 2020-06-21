<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'completed_exercises');
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
