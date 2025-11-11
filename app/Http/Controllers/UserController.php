<?php

namespace App\Http\Controllers;

use App\Components\ActivityChart\ActivityChart;
use App\Models\User;
use App\Models\Chapter;
use App\Services\RatingCalculator;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(User $user, RatingCalculator $ratingCalculator): View
    {
        $rating = $ratingCalculator->calculate();
        $userInRating = $rating->get($user->id);
        $points = $user->points;

        $position = $rating->has($user->id)
            ? $userInRating->position
            : 'N/A';

        $user->load('chapterMembers', 'exerciseMembers');
        $activityChart = ActivityChart::for($user->id);

        $chapters = Chapter::with('children', 'exercises')->get();
        $allChapters = $chapters->where('parent_id', null)->sortBy('path');
        $chapterMembers = $user->chapterMembers->keyBy('chapter_id');
        $exerciseMembers = $user->exerciseMembers->keyBy('exercise_id');

        return view('user.show', compact(
            'user',
            'position',
            'points',
            'activityChart',
            'chapters',
            'allChapters',
            'chapterMembers',
            'exerciseMembers'
        ));
    }
}
