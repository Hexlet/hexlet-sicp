<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\User;
use Auth;
use Illuminate\View\View;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $user->load('exerciseMembers', 'chapterMembers');

        $chapters = Chapter::with('children', 'exercises')->get();
        $mainChapters = $chapters->where('parent_id', null);
        $chapterMembers = $user->chapterMembers->keyBy('chapter_id');
        $exerciseMembers = $user->exerciseMembers->keyBy('exercise_id');

        return view('my.index', compact(
            'user',
            'chapters',
            'exerciseMembers',
            'mainChapters',
            'chapterMembers',
        ));
    }
}
