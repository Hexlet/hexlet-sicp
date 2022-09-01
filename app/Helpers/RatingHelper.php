<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RatingHelper
{
    public static function getCalculatedRating(?string $sortChapters = null, ?string $sortExercises = null): Collection
    {
        $calculatedRating = User::query()
            ->whereHas('readChapters')
            ->orWhereHas('completedExercises')
            ->withCount('readChapters')
            ->withCount('completedExercises')
            ->when(!empty($sortExercises), function ($q) use ($sortExercises) {
                $q->orderBy('completed_exercises_count', $sortExercises);
            })
            ->when(!empty($sortChapters), function ($q) use ($sortChapters) {
                $q->orderBy('read_chapters_count', $sortChapters);
            })
            ->limit(100)
            ->get()
            ->map(fn(User $user) => [
                'user' => $user,
                'points' => $user->read_chapters_count + $user->completed_exercises_count * 3,

            ])
            ->when(empty($sortChapters) && empty($sortExercises), function ($collection) {
                    return $collection->sortByDesc('points');
            })
            ->values()
            ->keyBy(fn($ratingPosition, $index) => $index + 1);

        return $calculatedRating;
    }

    public static function getStateSort(string $state, string $column): array
    {
        return match ($state) {
            'default' => [$column => 'asc'],
            'asc' => [$column => 'desc'],
            default => [],
        };
    }
}
