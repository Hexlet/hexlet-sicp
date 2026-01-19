<?php

namespace App\DTO\Progress;

use App\Models\Chapter;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

class ChapterProgressData extends Data
{
    public function __construct(
        public Chapter $chapter,
        public bool $hasChildren,
        public bool $isCompleted,
        public ?Collection $childrenProgress = null,
        public ?Collection $exercisesProgress = null,
    ) {
    }

    public function getCompletedChildrenCount(): int
    {
        if (!$this->hasChildren || $this->childrenProgress === null) {
            return 0;
        }

        return $this->childrenProgress->filter(fn($child) => $child->isCompleted)->count();
    }

    public function getTotalChildrenCount(): int
    {
        if (!$this->hasChildren || $this->childrenProgress === null) {
            return 0;
        }

        return $this->childrenProgress->count();
    }

    public function isStarted(): bool
    {
        return $this->getCompletedChildrenCount() > 0 && !$this->isCompleted;
    }

    public function isRootLevel(): bool
    {
        return $this->chapter->getChapterLevel() === 1;
    }
}
