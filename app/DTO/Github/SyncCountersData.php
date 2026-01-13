<?php

namespace App\DTO\Github;

use Spatie\LaravelData\Data;

class SyncCountersData extends Data
{
    public function __construct(
        public int $scanned,
        public int $synced,
        public int $skipped,
        public int $failed,
    ) {
    }
}
