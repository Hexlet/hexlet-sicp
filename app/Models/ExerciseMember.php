<?php

namespace App\Models;

use Database\Factories\ExerciseMemberFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Iben\Statable\Statable;

/**
 * @method static ExerciseMemberFactory factory(...$parameters)
 */
class ExerciseMember extends Model
{
    use HasFactory;
    use Statable;

    protected $attributes = [
            'state' => 'started',
        ];

    protected function getGraph()
    {
        return 'completed_exercise';
    }

    protected function saveBeforeTransition()
    {
        return true;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
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
}
