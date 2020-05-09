<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;
use Auth;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $user = User::with('readChapters', 'completedExercises')->find(Auth::id());
        $chapters = Chapter::with('children', 'exercises')->get();
        $mainChapters = $chapters->where('parent_id', null);

        return view('my.index', [
                'user' => $user,
                'chapters' => $chapters,
                'mainChapters' => $mainChapters,
                'completedExercises' => $user->completedExercises->keyBy('exercise_id'),
        ]);
    }
}
