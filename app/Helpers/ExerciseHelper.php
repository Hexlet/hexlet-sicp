<?php

namespace App\Helpers;

use App\Models\Exercise;
use File;

class ExerciseHelper
{
    public static function getExerciseListingViewFilepath(Exercise $exercise): string
    {
        $viewName = $exercise->present()->underscorePath;
        return sprintf('exercise.listing.%s', $viewName);
    }

    public static function getExerciseOriginLink(Exercise $exercise): ?string
    {
        $links = require resource_path('exercise-links.php');

        $link = $links[$exercise->path];

        return $link;
    }

    public static function getExercise(string $path): Exercise
    {
        $exercise = Exercise::query()
            ->where('path', $path)
            ->first();

        return $exercise;
    }

    public static function getExerciseTests(Exercise $exercise): string
    {
        $fileContent = self::getFileContent($exercise, '.blade.php');
        [, $testsLines] = explode(';;; END', $fileContent);

        return trim($testsLines);
    }

    public static function getExerciseTeacherSolution(Exercise $exercise): string
    {
        $fileContent = self::getFileContent($exercise, '_solution.blade.php');

        return trim($fileContent);
    }

    private static function getFileContent(Exercise $exercise, string $file_name): string
    {
        $underscoredExercisePath = $exercise->present()->underscorePath;
        $path = $exercise->getExercisePath($underscoredExercisePath, $file_name);
        $fileContent = File::get($path);

        return $fileContent;
    }
}
