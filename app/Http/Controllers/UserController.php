<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;

class UserController extends Controller {
	public function show(User $user): View{
		$rating = getCalculatedRating();
		$userRatingPosition = $rating
			->search(function (array $ratingPosition) use ($user) {
				['user' => $ratingUser] = $ratingPosition;
				return $ratingUser->id === $user->id;
			});

		if ($userRatingPosition) {
			['points' => $points] = $rating->get($userRatingPosition);
		} else {
			$points = 0;
			$userRatingPosition = 'N/A';
		}
		$user->load('readChapters', 'completedExercises');
		$chart = getChart($user->id);
		return view('user.show', compact(
			'user',
			'userRatingPosition',
			'points',
			'chart'
		));
	}
}
