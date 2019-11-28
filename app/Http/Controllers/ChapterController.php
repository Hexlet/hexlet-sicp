<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters  = Chapter::where('parent_id', null)->get();
        return view('chapter.index', compact('chapters'));
    }

    public function show(Chapter $chapter)
    {
        $chapter->load([
            'parent',
            'children',
            'users',
        ]);
        return view('chapter.show', compact('chapter'));
    }
}
