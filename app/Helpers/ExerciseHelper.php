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

    public static function getExerciseTitle(Exercise $exercise): string
    {
        return $exercise->present()->title;
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
        $underscoredExercisePath = $exercise->present()->underscorePath;

        $path = implode(DIRECTORY_SEPARATOR, [
            resource_path(),
            'views',
            'exercise',
            'solution_stub',
            sprintf('%s.blade.php', $underscoredExercisePath),
        ]);

        $fileContent = File::get($path);
        [, $testsLines] = explode(';;; END', $fileContent);

        return trim($testsLines);
    }

    public static function exerciseHasTests(Exercise $exercise): bool
    {
        $underscoredExercisePath = self::underscoreExercisePath($exercise->path);

        $path = implode(DIRECTORY_SEPARATOR, [
            resource_path(),
            'views',
            'exercise',
            'solution_stub',
            sprintf('%s.blade.php', $underscoredExercisePath),
        ]);

        return File::exists($path);
    }

    public static function underscoreExercisePath(string $path): string
    {
        return str_replace('.', '_', $path);
    }

    public static function getFullExerciseTitle(Exercise $exercise): string
    {
        return $exercise->present()->fullTitle;
    }

    public static function exerciseHasTeacherSolution(Exercise $exercise): bool
    {
        $underscoredExercisePath = self::underscoreExercisePath($exercise->path);

        $path = implode(DIRECTORY_SEPARATOR, [
            resource_path(),
            'views',
            'exercise',
            'solution_stub',
            sprintf('%s_solution.blade.php', $underscoredExercisePath),
        ]);

        return File::exists($path);
    }

    public static function getExerciseTeacherSolution(Exercise $exercise): string
    {
        $underscoredExercisePath = $exercise->present()->underscorePath;

        $path = implode(DIRECTORY_SEPARATOR, [
            resource_path(),
            'views',
            'exercise',
            'solution_stub',
            sprintf('%s_solution.blade.php', $underscoredExercisePath),
        ]);

        $fileContent = File::get($path);

        return trim($fileContent);
    }
}
