<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravelista\Comments\Commentable;

class Chapter extends Model
{
    use Commentable;
    
    public function users()
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

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function getCanReadAttribute()
    {
        return $this->children->count() === 0;
    }

    public function getChapterLevel(): int
    {
        return count(explode('.', $this->path));
    }
}
