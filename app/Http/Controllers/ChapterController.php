<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = buildChaptersTreeFromStructure(Chapter::orderBy("parent_id")->get());
        return view('chapter.index', ['chapters' => $chapters]);
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
