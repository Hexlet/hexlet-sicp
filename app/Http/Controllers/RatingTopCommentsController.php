<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RatingTopCommentsController extends Controller
{
    public function index(): View
    {
        $commentsRating = getCommentsRating();

        return view('rating.comments', compact('commentsRating'));
    }
}
