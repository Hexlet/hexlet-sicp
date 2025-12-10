<?php

namespace App\Http\Controllers;

use App\Components\ActivityChart\ActivityChart;
use App\Models\User;
use App\Models\Chapter;
use App\Services\RatingCalculator;
use App\Services\ChapterProgressService;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(
        User $user,
        RatingCalculator $ratingCalculator,
        ChapterProgressService $chapterProgressService
    ): View {
        $rating = $ratingCalculator->calculate();
        $userInRating = $rating->get($user->id);
        $points = $user->points;

        $position = $rating->has($user->id)
            ? $userInRating->position
            : 'N/A';

        $user->load('chapterMembers', 'exerciseMembers');
        $activityChart = ActivityChart::for($user->id);

        $rootChapters = Chapter::with(['children', 'exercises'])
            ->whereNull('parent_id')
            ->get()
            ->sortBy('path');

        $chapterMembers = $user->chapterMembers->keyBy('chapter_id');
        $exerciseMembers = $user->exerciseMembers->keyBy('exercise_id');

        $chaptersProgress = $rootChapters->map(
            fn($chapter) => $chapterProgressService->buildChapterProgress(
                $chapter,
                $chapterMembers,
                $exerciseMembers,
                0
            )
        );

        return view('user.show', compact(
            'user',
            'position',
            'points',
            'activityChart',
            'chaptersProgress'
        ));
    }
}
