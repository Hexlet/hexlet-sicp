<?php

namespace App\Models;

use Database\Factories\SolutionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static SolutionFactory factory(...$parameters)
 */
class Solution extends Model
{
    use HasFactory;

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
            }, $this->getTable());
    }
}
