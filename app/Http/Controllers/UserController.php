<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('readChapters');

        $chapters = Chapter::with('children')->get();

        return view('user.show', [
            'user' => $user,
            'chapters' => $chapters,
        ]);
    }
}
