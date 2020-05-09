<?php

use App\User;
use Illuminate\Support\Collection;

if (!function_exists('getCalculatedRating')) {
    function getCalculatedRating(): Collection
    {
        $calculatedRating = User::query()
            ->whereHas('readChapters')
            ->orWhereHas('completedExercises')
            ->withCount('readChapters')
            ->withCount('completedExercises')
            ->orderBy('completed_exercises_count', 'DESC')
            ->orderBy('read_chapters_count', 'DESC')
            ->limit(100)
            ->get()
            ->map(fn(User $user) => [
                'user' => $user,
                'points' => $user->read_chapters_count + $user->completed_exercises_count * 3

            ])
            ->sortByDesc('points')
            ->values()
            ->keyBy(fn($ratingPosition, $index) => $index + 1);

        return $calculatedRating;
    }
}
