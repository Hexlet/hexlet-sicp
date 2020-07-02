<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;
use App\Exercise;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $completedExercises = $user->completedExercises->keyBy('exercise_id');
        $lastSolutions = $user->solutions()
        ->with('exercise')
        ->groupBy('exercise_id', 'id')
        ->orderBy('exercise_id')
        ->paginate(10);

        return view('my.index', compact(
            'user',
            'chapters',
            'mainChapters',
            'completedExercises',
            'lastSolutions'
        ));
    }
}
