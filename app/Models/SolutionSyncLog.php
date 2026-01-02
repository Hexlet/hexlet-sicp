<?php

namespace App\Models;

use App\Enums\SyncStatus;
use App\Enums\SyncType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolutionSyncLog extends Model
{
    protected $fillable = [
        'github_repository_id',
        'solution_id',
        'sync_type',
        'commit_sha',
        'file_path',
        'status',
        'error_message',
    ];

    protected $casts = [
        'sync_type' => SyncType::class,
        'status' => SyncStatus::class,
    ];

    public function githubRepository(): BelongsTo
    {
        return $this->belongsTo(GitHubRepository::class);
    }

    public function solution(): BelongsTo
    {
        return $this->belongsTo(Solution::class);
    }
}
