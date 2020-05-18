<?php

namespace App\Http\Controllers;

use App\User;

class RatingTopController extends Controller
{
    public function index()
    {
        $rating = getCalculatedRating();

        return view('rating.index', [
           'rating' => $rating,
        ]);
    }
}
