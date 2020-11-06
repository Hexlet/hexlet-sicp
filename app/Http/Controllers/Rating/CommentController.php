<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        $commentsRating = getCommentsRating();

        return view('rating.comments', compact('commentsRating'));
    }
}
