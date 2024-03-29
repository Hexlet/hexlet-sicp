<?php

namespace App\Http\Controllers;

use App\Helpers\ChartHelper;
use App\Models\User;
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
        $chart = ChartHelper::getChart($user->id);
        return view('user.show', compact(
            'user',
            'position',
            'points',
            'chart'
        ));
    }
}
