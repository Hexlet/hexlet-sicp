<?php

namespace App\Models;

use App\Enums\SyncDirection;
use App\Enums\SyncStatus;
use App\Enums\SyncType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $sync_run_id
 * @property int $github_repository_id
 * @property int|null $solution_id
 * @property SyncType $sync_type
 * @property SyncDirection $sync_direction
 * @property string|null $commit_sha
 * @property string $file_path
 * @property SyncStatus $status
 * @property string|null $error_message
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read GithubRepository $githubRepository
 * @property-read Solution|null $solution
 */
class SolutionSyncLog extends Model
{
    protected $fillable = [
        'sync_run_id',
        'github_repository_id',
        'solution_id',
        'sync_type',
        'sync_direction',
        'commit_sha',
        'file_path',
        'status',
        'error_message',
    ];

    protected $casts = [
        'sync_type' => SyncType::class,
        'sync_direction' => SyncDirection::class,
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
