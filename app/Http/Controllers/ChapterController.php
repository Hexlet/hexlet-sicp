<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters  = Chapter::all()->groupBy('parent_id');
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
