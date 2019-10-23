<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ChapterController extends Controller
{
    public function index()
    {
        $treeFilepath = database_path('chapters.yml');
        $treeStructure = Yaml::parseFile($treeFilepath);
        $chapters = buildChaptersTreeFromStructure(Chapter::get(), $treeStructure);

        return view('chapter.index', ['chapters' => $chapters]);
    }
}
