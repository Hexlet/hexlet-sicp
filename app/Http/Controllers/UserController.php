<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('readChapters', 'completedExercises');
        $chapters = Chapter::with('children', 'exercises')->get();

        return view('user.show', [
            'user' => $user,
            'chapters' => $chapters,
            'completedExercises' => $user->completedExercises->keyBy('exercise_id')
        ]);
    }
}
