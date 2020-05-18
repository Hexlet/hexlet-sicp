<?php

namespace App\Http\Controllers;

class RatingTopCommentsController extends Controller
{
    public function index()
    {
        $commentsRating = getCommentsRating();

        return view('rating.comments', [
            'commentsRating' => $commentsRating,
        ]);
    }
}
