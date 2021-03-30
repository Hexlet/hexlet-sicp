<?php

namespace App\Helpers;

use App\Models\Exercise;
use File;

class ExerciseHelper
{
    public static function getExerciseListingViewFilepath(string $exercisePath): string
    {
        $viewName = self::underscoreExercisePath($exercisePath);
        return sprintf('exercise.listing.%s', $viewName);
    }

    public static function getExerciseTitle(Exercise $exercise): ?string
    {
        $underscoredPath = self::underscoreExercisePath($exercise->path);

        $titleTranslatePath = "exercises/{$underscoredPath}.title";

        if (\Lang::has($titleTranslatePath)) {
            return __($titleTranslatePath);
        }

        return null;
    }

    public static function getExerciseOriginLink(Exercise $exercise): ?string
    {
        $links = require resource_path('exercise-links.php');

        return $links[$exercise->path] ?? null;
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
        $underscoredExercisePath = self::underscoreExercisePath($exercise->path);

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

    public static function getFullExerciseTitle(Exercise $exercise): ?string
    {
        $path = $exercise->path;
        $exerciseTitle = self::getExerciseTitle($exercise);

        return "$path $exerciseTitle";
    }
}
