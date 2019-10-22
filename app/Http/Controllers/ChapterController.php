<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ChapterController extends Controller
{
    public function index()
    {
        $treeStructureFilepath = database_path('chapters.yml');
        $treeStructure = Yaml::parseFile($treeStructureFilepath);
        $chapters = buildChaptersTreeFromStructure(Chapter::get(), $treeStructure);

        return view('chapter.index', ['chapters' => $chapters]);
    }
}
