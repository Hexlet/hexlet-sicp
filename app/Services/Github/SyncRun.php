<?php

namespace App\Services\Github;

use App\DTO\Github\SyncCountersData;
use App\DTO\Github\SyncResultData;
use App\Enums\SyncDirection;
use App\Enums\SyncStatus;
use App\Enums\SyncType;
use App\Models\GithubRepository;
use App\Models\SolutionSyncLog;
use Carbon\Carbon;

class SyncRun
{
    private string $runId;
    private int $scanned = 0;
    private int $synced = 0;
    private int $skipped = 0;
    private int $failed = 0;

    private ?Carbon $startedAt = null;
    private ?Carbon $finishedAt = null;

    public function __construct(
        private readonly GithubRepository $repo,
        private readonly SyncType $type,
        private readonly SyncDirection $direction,
        private readonly array $meta = [],
    ) {
        $this->runId = \Str::uuid()->toString();
    }

    public function getRunId(): string
    {
        return $this->runId;
    }

    public function markStarted(): self
    {
        $this->startedAt = now();
        return $this;
    }

    public function markFinished(): self
    {
        $this->finishedAt = now();
        return $this;
    }

    public function incrementScanned(): self
    {
        $this->scanned += 1;
        return $this;
    }

    public function addSkipped(): self
    {
        $this->skipped += 1;
        return $this;
    }

    public function addSynced(
        int $solutionId,
        string $filePath,
        ?string $commitSha = null,
    ): self {
        $this->synced += 1;

        SolutionSyncLog::create([
            'sync_run_id' => $this->runId,
            'github_repository_id' => $this->repo->id,
            'solution_id' => $solutionId,
            'sync_type' => $this->type->value,
            'sync_direction' => $this->direction->value,
            'commit_sha' => $commitSha,
            'file_path' => $filePath,
            'status' => SyncStatus::Success->value,
        ]);

        return $this;
    }

    public function addFailed(
        string $filePath,
        \Throwable $error,
        ?int $solutionId = null,
    ): self {
        $this->failed += 1;

        SolutionSyncLog::create([
            'sync_run_id' => $this->runId,
            'github_repository_id' => $this->repo->id,
            'solution_id' => $solutionId,
            'sync_type' => $this->type->value,
            'sync_direction' => $this->direction->value,
            'file_path' => $filePath,
            'status' => SyncStatus::Failed->value,
            'error_message' => $error->getMessage(),
        ]);

        return $this;
    }

    public function toData(): SyncResultData
    {
        return new SyncResultData(
            runId: $this->runId,
            type: $this->type,
            direction: $this->direction,
            counters: new SyncCountersData(
                scanned: $this->scanned,
                synced: $this->synced,
                skipped: $this->skipped,
                failed: $this->failed,
            ),
            startedAt: $this->startedAt?->toIso8601String() ?? '',
            finishedAt: $this->finishedAt?->toIso8601String() ?? '',
            meta: $this->meta,
        );
    }
}
