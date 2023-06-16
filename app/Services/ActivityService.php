<?php

namespace App\Services;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ActivityService
{
    public const ACTIVITY_EXERCISE_REMOVED = 'destroy_exercise';
    public const ACTIVITY_CHAPTER_REMOVED = 'removed';
    public const ACTIVITY_EXERCISE_COMPLETED = 'completed_exercise';
    public const ACTIVITY_SOLUTION_ADDED = 'add_solution';
    public const ACTIVITY_CHAPTER_ADDED = 'added';
    public const COMMENTED = 'commented';

    public function logAddedSolution(User $user, Solution $solution): void
    {
        $properties = [
            'exercise_id' => $solution->exercise->id,
            'exercise_path' => $solution->exercise->path,
        ];

        activity()
            ->performedOn($solution)
            ->causedBy($user)
            ->withProperties($properties)
            ->log(self::ACTIVITY_SOLUTION_ADDED);
    }

    public function logCompletedExercise(User $user, Exercise $exercise): void
    {
        activity()
            ->performedOn($exercise)
            ->causedBy($user)
            ->withProperties(['exercise_id' => $exercise->id])
            ->log(self::ACTIVITY_EXERCISE_COMPLETED);
    }

    public function logRemovedExercise(User $user, Exercise $exercise): void
    {
        activity()
            ->performedOn($exercise)
            ->causedBy($user)
            ->withProperties(['exercise_id' => $exercise->id])
            ->log(self::ACTIVITY_EXERCISE_REMOVED);
    }

    public function logChangedUserChapters(
        User $user,
        Collection $userChaptersOld,
        Collection $userChaptersNew
    ): void {
        [$log, $chapters] = $this->calculateChaptersDiff($userChaptersOld, $userChaptersNew);

        if ($log) {
            $properties = [
                'chapters' => $chapters,
                'count' => count($chapters),
                'url' => route('users.show', $user),
            ];
            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->withProperties($properties)
                ->log($log);
        }
    }

    public function logRemovedUserChapter(User $user, Chapter $chapter): void
    {
        $properties = [
            'chapters' => [$chapter->path],
            'count' => 1,
            'url' => route('users.show', $user),
        ];

        activity()
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties(
                $properties
            )->log(self::ACTIVITY_CHAPTER_REMOVED);
    }

    public function logCreatedComment(User $user, Comment $comment): void
    {
        activity()
            ->performedOn($comment)
            ->causedBy($user)
            ->withProperties(['comment' => $comment, 'url' => $comment->present()->getLink()])
            ->log(self::COMMENTED);
    }

    private function calculateChaptersDiff(Collection $chaptersOld, Collection $chaptersNew): array
    {
        $chapters = $chaptersNew->diff($chaptersOld);
        if (count($chapters)) {
            return [self::ACTIVITY_CHAPTER_ADDED, $chapters];
        }

        $chapters = $chaptersOld->diff($chaptersNew);
        if (count($chapters)) {
            return [self::ACTIVITY_CHAPTER_REMOVED, $chapters];
        }

        return ['', []];
    }
}
