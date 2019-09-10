<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $allChapters = Chapter::all();
        $userReadChapters = $user->readChapters;

        $chaptersTree = $allChapters->each(function ($chapter) use ($userReadChapters) {
            $chapter->is_read = $userReadChapters->contains('id', $chapter->id);
        })->pluck('is_read', 'path');

        return view('user.index', [
            'user' => $user,
            'chaptersTree' => $chaptersTree
        ]);
    }
}
