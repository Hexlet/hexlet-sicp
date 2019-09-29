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

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function getCanReadAttribute()
    {
        return $this->children->count() === 0;
    }
}
