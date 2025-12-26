<?php

namespace App\Models;

use App\Enums\GithubRepositoryStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\GithubRepository
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $default_branch
 * @property string $webhook_secret
 * @property string|null $webhook_id
 * @property GithubRepositoryStatus $status
 * @property string|null $last_error
 * @property Carbon|null $last_sync_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $owner
 * @property-read string $full_name
 * @property-read string $url
 * @property-read User $user
 * @property-read Collection|SolutionSyncLog[] $syncLogs
 * @property-read int|null $sync_logs_count
 */
class GithubRepository extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'default_branch',
        'webhook_secret',
        'webhook_id',
        'status',
        'last_error',
        'last_sync_at',
    ];

    protected $casts = [
        'last_sync_at' => 'datetime',
        'status' => GithubRepositoryStatus::class,
    ];

    protected $hidden = [
        'webhook_secret',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function syncLogs(): HasMany
    {
        return $this->hasMany(SolutionSyncLog::class);
    }

    public function getOwnerAttribute(): string
    {
        return $this->user->github_name;
    }

    public function getFullNameAttribute(): string
    {
        return $this->owner . '/' . $this->name;
    }

    public function getUrlAttribute(): string
    {
        return 'https://github.com/' . $this->full_name;
    }
}
