<?php

namespace App\Models;

use App\Enums\GithubRepositoryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GitHubRepository extends Model
{
    protected $fillable = [
        'user_id',
        'name',
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
