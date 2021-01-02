<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\View\View;

class ChapterController extends Controller
{
    public function index(): View
    {
        $chapters = Chapter::with('exercises')->get()->groupBy('parent_id');

        return view('chapter.index', compact('chapters'));
    }

    public function show(Chapter $chapter): View
    {
        $chapter->load([
            'parent',
            'children',
            'users',
            'exercises',
            'comments',
        ]);

        /**
         * @var User $authUser
         */
        $authUser = auth()->user() ?? User::make([]);
        $previousChapter = Chapter::whereId($chapter->id - 1)->firstOrNew([]);
        $nextChapter = Chapter::whereId($chapter->id + 1)->firstOrNew([]);
        $isCompletedChapter = $authUser->readChapters()->where('chapter_id', $chapter->id)->exists();

        return view('chapter.show', compact(
            'chapter',
            'isCompletedChapter',
            'authUser',
            'previousChapter',
            'nextChapter',
        ));
    }
}
