<?php

namespace App\Services;

use App\DTO\Progress\ChapterProgressData;
use App\DTO\Progress\ExerciseProgressData;
use App\Models\Chapter;
use Illuminate\Support\Collection;

class ChapterProgressService
{
    public function buildChapterProgress(
        Chapter $chapter,
        Collection $chapterMembers,
        Collection $exerciseMembers,
        int $level = 0
    ): ChapterProgressData {
        $hasChildren = $chapter->children->isNotEmpty();
        $isCompleted = $chapterMembers->has($chapter->id) && $chapterMembers[$chapter->id]->isFinished();

        $completedChildren = null;
        $totalChildren = null;
        $childrenProgress = null;

        if ($hasChildren) {
            $chapter->children->loadMissing(['children', 'exercises']);

            [$completedChildren, $totalChildren] = $this->calculateChildrenProgress($chapter, $chapterMembers);

            $childrenProgress = $chapter->children->sortBy('path')->map(
                fn($child) => $this->buildChapterProgress(
                    $child,
                    $chapterMembers,
                    $exerciseMembers,
                    $level + 1
                )
            );
        }

        $exercisesProgress = $this->buildExercisesProgress(
            $chapter,
            $exerciseMembers
        );

        return new ChapterProgressData(
            chapter: $chapter,
            hasChildren: $hasChildren,
            isCompleted: $isCompleted,
            level: $level,
            completedChildren: $completedChildren,
            totalChildren: $totalChildren,
            childrenProgress: $childrenProgress,
            exercisesProgress: $exercisesProgress,
        );
    }

    private function calculateChildrenProgress(Chapter $chapter, Collection $chapterMembers): array
    {
        $completedChildren = 0;
        $totalChildren = 0;

        $chapter->children->loadMissing('children');

        foreach ($chapter->children as $child) {
            if ($child->children->count() > 0) {
                foreach ($child->children as $grandChild) {
                    $totalChildren += 1;
                    if ($chapterMembers->has($grandChild->id) && $chapterMembers[$grandChild->id]->isFinished()) {
                        $completedChildren += 1;
                    }
                }
            } else {
                $totalChildren += 1;
                if ($chapterMembers->has($child->id) && $chapterMembers[$child->id]->isFinished()) {
                    $completedChildren += 1;
                }
            }
        }

        return [$completedChildren, $totalChildren];
    }

    private function buildExercisesProgress(Chapter $chapter, Collection $exerciseMembers): ?Collection
    {
        if ($chapter->exercises->isEmpty()) {
            return null;
        }

        return $chapter->exercises->map(function ($exercise) use ($exerciseMembers) {
            $isCompleted = $exerciseMembers->has($exercise->id) && $exerciseMembers[$exercise->id]->isFinished();
            $isStarted = $exerciseMembers->has($exercise->id) && $exerciseMembers[$exercise->id]->isStarted();

            return new ExerciseProgressData(
                exercise: $exercise,
                isCompleted: $isCompleted,
                isStarted: $isStarted,
            );
        });
    }
}
