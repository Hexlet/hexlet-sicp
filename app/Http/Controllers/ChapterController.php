<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::with('exercises')->get()->groupBy('parent_id');

        return view('chapter.index', compact('chapters'));
    }

    public function show(Chapter $chapter)
    {
        $chapter->load([
            'parent',
            'children',
            'users',
            'exercises',
            'comments'
        ]);
        /** @var User $user */
        $user = auth()->user() ?? User::make([]);
        $isCompletedChapter = $user->readChapters()->where('chapter_id', $chapter->id)->exists();
        return view('chapter.show', compact('chapter', 'isCompletedChapter'));
    }
}
