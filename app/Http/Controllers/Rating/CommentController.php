<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Services\CommentsRatingCalculator;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        $commentsRating = CommentsRatingCalculator::calculate();

        return view('rating.comments', compact('commentsRating'));
    }
}
