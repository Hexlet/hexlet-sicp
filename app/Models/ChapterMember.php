<?php

namespace App\Models;

use Database\Factories\ChapterMemberFactory;
use Iben\Statable\Statable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static ChapterMemberFactory factory(...$parameters)
 */
class ChapterMember extends Model
{
    use HasFactory;
    use Statable;

    public const INITIAL_STATE = 'started';

    protected function getGraph(): string
    {
        return 'chapter_member';
    }

    protected function saveBeforeTransition(): bool
    {
        return true;
    }

    public function mayFinish(): bool
    {
        return $this->canApply('finish');
    }

    public function isFinished(): bool
    {
        return $this->state === 'finished';
    }

    public function isNotFinished(): bool
    {
        return !$this->isFinished();
    }

    public function finish(): void
    {
        $this->apply('finish');
    }

    public function isStarted(): bool
    {
        return $this->state === 'started';
    }

    public function scopeFinished(Builder $builder): Builder
    {
        return $builder->where('state', '=', 'finished');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    protected function state(): Attribute
    {
        return Attribute::make(
            get:fn ($state) => $state ?? self::INITIAL_STATE
        );
    }
}
