<?php

namespace App\Http\Controllers;

use App\User;

class RatingController extends Controller
{
    public function index()
    {
        $users = User::withCount('readChapters')
            ->orderBy('read_chapters_count', 'DESC')
            ->get();

        return view('rating.index', [
           'users' => $users,
        ]);
    }
}
