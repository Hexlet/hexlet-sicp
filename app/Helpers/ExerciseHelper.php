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

    public static function exerciseHasTests(Exercise $exercise): bool
    {
        return self::isPathExist($exercise, '.blade.php');
    }

    public static function getExerciseTests(Exercise $exercise): string
    {
        $fileContent = self::getFileContent($exercise, '.blade.php');
        [, $testsLines] = explode(';;; END', $fileContent);

        return trim($testsLines);
    }

    public static function exerciseHasTeacherSolution(Exercise $exercise): bool
    {
        return self::isPathExist($exercise, '_solution.blade.php');
    }

    public static function getExerciseTeacherSolution(Exercise $exercise): string
    {
        $fileContent = self::getFileContent($exercise, '_solution.blade.php');

        return trim($fileContent);
    }

    public static function underscoreExercisePath(string $path): string
    {
        return str_replace('.', '_', $path);
    }

    public static function getFullExerciseTitle(Exercise $exercise): string
    {
        return $exercise->present()->fullTitle;
    }

    private static function getPathExercise(string $underscoredExercisePath, string $file_name): string
    {
        $path = implode(DIRECTORY_SEPARATOR, [
            resource_path(),
            'views',
            'exercise',
            'solution_stub',
            sprintf('%s%s', $underscoredExercisePath, $file_name),
        ]);
        return $path;
    }

    private static function isPathExist(Exercise $exercise, string $file_name): bool
    {
        $underscoredExercisePath = self::underscoreExercisePath($exercise->path);
        $path = self::getPathExercise($underscoredExercisePath, $file_name);

        return File::exists($path);
    }

    private static function getFileContent(Exercise $exercise, string $file_name): string
    {
        $underscoredExercisePath = $exercise->present()->underscorePath;
        $path = self::getPathExercise($underscoredExercisePath, $file_name);
        $fileContent = File::get($path);

        return $fileContent;
    }
}
