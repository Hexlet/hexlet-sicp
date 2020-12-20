<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Solution extends Model
{
    protected $fillable = [
        'content',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function scopeVersioned(Builder $builder): Builder
    {
        return $builder
            ->from(function ($q) {
                $q->groupBy('id', 'exercise_id', 'user_id')
                    ->distinct('exercise_id', 'user_id')
                    ->orderBy('exercise_id')
                    ->orderBy('user_id')
                    ->from(self::getTable());
            }, self::getTable());
    }
}
