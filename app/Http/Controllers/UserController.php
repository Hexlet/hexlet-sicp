<?php

namespace App\Http\Controllers;

use App\Helpers\ChartHelper;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(User $user): View
    {
        $rating = getCalculatedRating();
        $userInRating = $rating->get($user->id);
        if ($userInRating) {
            $points = $userInRating->points;
            $position = $userInRating->position;
        } else {
            $points = 0;
            $position = 'N/A';
        }
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
