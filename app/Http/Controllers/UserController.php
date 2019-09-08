<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $allChapters = Chapter::with('user')->get();

        return view('user.index', [
            'user' => $user,
            'allChapters' => $allChapters
        ]);
    }
}
