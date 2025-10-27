<?php

namespace App\Components\ActivityChart;

use App\Components\ActivityChart\Enums\ActivityLevel;
use Carbon\Carbon;

readonly class Square
{
    private ActivityLevel $level;

    public function __construct(
        private Carbon $date,
        private int $count,
    ) {
        $this->level = ActivityLevel::fromCount($count);
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function getFormattedDate(): string
    {
        return $this->date->format('Y-m-d');
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getLevel(): ActivityLevel
    {
        return $this->level;
    }

    public function getTitle(): string
    {
        return "{$this->getFormattedDate()}: {$this->count} ";
    }
}
