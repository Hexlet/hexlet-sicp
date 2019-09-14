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

        $chaptersTree = $allChapters->map(function ($chapter) use ($userReadChapters) {
            return [
                'id' => $chapter->id,
                'path' => $chapter->path,
                'is_read' => $userReadChapters->contains('chapter_id', $chapter->id),
            ];
        });

        return view('user.index', [
            'user' => $user,
            'chaptersTree' => $chaptersTree
        ]);
    }
}
