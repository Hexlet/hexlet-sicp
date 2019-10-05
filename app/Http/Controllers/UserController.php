<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class UserController extends Controller
{
    public function show(int $id)
    {
        $user = User::where('id', $id)->with('readChapters')->firstOrFail();

        $chapters = Chapter::with('children')->get();

        return view('user.show', [
            'user' => $user,
            'chapters' => $chapters,
        ]);
    }
}
