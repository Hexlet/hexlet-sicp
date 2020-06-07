<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public const MARKABLE_COUNT = 101;

    public function users()
    {
        return $this->belongsToMany(User::class, 'read_chapters');
    }

    public function comments()
    {
        return $this->morphMany('\App\Comment', 'commentable');
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
