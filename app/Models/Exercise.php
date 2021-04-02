<?php

namespace App\Models;

use App\Presenters\ExercisePresenter;
use Hemp\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method ExercisePresenter present()
 */
class Exercise extends Model
{
    use Presentable;

    public string $defaultPresenter = ExercisePresenter::class;

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'completed_exercises');
    }

    public function solutions(): HasMany
    {
        return $this->hasMany(Solution::class);
    }
}
