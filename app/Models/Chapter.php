<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Chapter extends Model
{
    public const MARKABLE_COUNT = 101;

    public function members(): HasMany
    {
        return $this->hasMany(ChapterMember::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany('\App\Models\Comment', 'commentable');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    public function getCanReadAttribute(): bool
    {
        return $this->children->isEmpty();
    }

    public function getChapterLevel(): int
    {
        return count(explode('.', $this->path));
    }
}
