<?php

namespace App\Http\Controllers;

use App\User;

class UserChapterController extends Controller
{
    public function store(User $user)
    {
        $user->readChapter(request('chapter_id'));

        return response()->json('Chapter successfully save', 201);
    }
}
