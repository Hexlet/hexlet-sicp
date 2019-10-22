<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ChapterController extends Controller
{
    public function index()
    {
        $treeStructure = Yaml::parseFile(database_path('chapters.yml'));
        $chapters = buildChaptersTreeFromStructure(Chapter::get(), $treeStructure);

        return view('chapter.index', ['chapters' => $chapters]);
    }
}
