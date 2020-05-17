<?php

namespace App\Http\Controllers;

use App\User;

class RatingController extends Controller
{
    public function index()
    {
        $rating = getCalculatedRating();

        return view('rating.index', [
           'rating' => $rating,
        ]);
    }

    public function showCommentsRating()
    {
        $commentsRating = getCommentsRating();

        return view('rating.comments', [
            'commentsRating' => $commentsRating,
        ]);
    }
}
