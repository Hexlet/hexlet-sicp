<?php

use App\Models\User;
use Illuminate\Support\Collection;

if (!function_exists('getCommentsRating')) {
    function getCommentsRating(): Collection
    {
        $commentsRating = User::query()
            ->withCount('comments')
            ->orderBy('comments_count', 'DESC')
            ->limit(100)
            ->get()
            ->map(fn(User $user) => [
                'user' => $user,
                'commentsCount' => $user->comments_count,
            ])
            ->sortByDesc('commentsCount')
            ->values()
            ->keyBy(fn($ratingPosition, $index) => $index + 1);

        return $commentsRating;
    }
}
