<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all()->map(function ($exercise) {
            $path = $exercise->path;
            return ['chapter' => substr($path, 0, 1), 'path' => $path];
        })->groupBy('chapter');
        return view('exercise.index', compact('exercises'));
    }
}
