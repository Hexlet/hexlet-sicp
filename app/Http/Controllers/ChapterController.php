<?php

namespace App\Http\Controllers;

use App\Chapter;

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
        return view('chapter.show', compact('chapter'));
    }
}
