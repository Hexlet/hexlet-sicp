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

        if (request()->wantsJson()) {
            return $users;
        }

        return view('rating.index', [
           'users' => $users,
        ]);
    }
}
