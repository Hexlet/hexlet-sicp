<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $chapters = Chapter::with('children')->get();
        $readChapters = $user->readChapters;

        return view('user.show', [
            'user' => $user,
            'chapters' => $chapters,
        ]);
    }
}
