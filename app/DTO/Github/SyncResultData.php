<?php

namespace App\DTO\Github;

use App\Enums\SyncDirection;
use App\Enums\SyncType;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class SyncResultData extends Data
{
    public function __construct(
        public string $runId,
        public SyncType $type,
        public SyncDirection $direction,
        public SyncCountersData $counters,
        public string $startedAt,
        public string $finishedAt,
        public array $meta,
    ) {
    }

    public function getSummary(): string
    {
        $durationMs = 0;
        if ($this->startedAt && $this->finishedAt) {
            $start = Carbon::parse($this->startedAt);
            $end = Carbon::parse($this->finishedAt);
            $durationMs = $start->diffInMilliseconds($end);
        }

        return sprintf(
            'Sync %s completed: %d synced, %d skipped, %d failed (scanned: %d, duration: %dms)',
            $this->direction->value,
            $this->counters->synced,
            $this->counters->skipped,
            $this->counters->failed,
            $this->counters->scanned,
            $durationMs
        );
    }
}
