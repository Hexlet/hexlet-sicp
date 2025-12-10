<?php

namespace App\DTO\Progress;

use App\Models\Chapter;
use Illuminate\Support\Collection;

readonly class ChapterProgressData
{
    public function __construct(
        public Chapter $chapter,
        public bool $hasChildren,
        public bool $isCompleted,
        public int $level,
        public ?int $completedChildren = null,
        public ?int $totalChildren = null,
        public ?Collection $childrenProgress = null,
        public ?Collection $exercisesProgress = null,
    ) {
    }

    public function isFullyCompleted(): bool
    {
        return $this->hasChildren && $this->completedChildren === $this->totalChildren;
    }

    public function isPartiallyCompleted(): bool
    {
        return $this->hasChildren && $this->completedChildren > 0 && $this->completedChildren < $this->totalChildren;
    }

    public function isRootLevel(): bool
    {
        return $this->level === 0;
    }

    public function isNestedLevel(): bool
    {
        return $this->level === 1 || $this->level === 2;
    }
}
