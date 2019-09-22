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

        $readChaptersById = $readChapters->mapWithKeys(function ($chapter) {
            return [
                $chapter->chapter_id => $chapter,
            ];
        });

        return view('user.index', [
            'user' => $user,
            'chapters' => $chapters,
            'readChaptersById' => $readChaptersById,
        ]);
    }
}
