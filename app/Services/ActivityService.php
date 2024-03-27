<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Support\Collection;

class ActivityService
{
    public const ACTIVITY_EXERCISE_REMOVED = 'destroy_exercise';
    public const ACTIVITY_CHAPTER_REMOVED = 'removed';
    public const ACTIVITY_EXERCISE_COMPLETED = 'completed_exercise';
    public const ACTIVITY_SOLUTION_ADDED = 'add_solution';
    public const ACTIVITY_CHAPTER_ADDED = 'added';
    public const ACTIVITY_MULTIPLE_CHAPTERS_ADDED = 'multiple_chapters_added';
    public const ACTIVITY_CHAPTER_MEMBER_FINISHED = 'chapter_member_finished';
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

    public function logChapterMemberFinished(ChapterMember $chapterMember): void
    {
        activity()
            ->performedOn($chapterMember)
            ->causedBy($chapterMember->user)
            ->log(self::ACTIVITY_CHAPTER_MEMBER_FINISHED);
    }

    public function logCreatedComment(User $user, Comment $comment): void
    {
        activity()
            ->performedOn($comment)
            ->causedBy($user)
            ->withProperties($this->getCreatedCommentActivityProperties($comment))
            ->log(self::COMMENTED);
    }

    public function updateCreatedCommentActivity(Comment $comment): void
    {
        $activity = Activity::where('subject_type', Comment::class)
            ->where('subject_id', $comment->id)
            ->where('description', self::COMMENTED)
            ->first();

        $activity->properties = collect($this->getCreatedCommentActivityProperties($comment));
        $activity->save();
    }

    private function getCreatedCommentActivityProperties(Comment $comment): array
    {
        return [
            'comment' => $comment,
            'url' => $comment->present()->getLink(),
        ];
    }
}
