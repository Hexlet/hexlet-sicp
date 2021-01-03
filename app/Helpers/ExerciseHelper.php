<?php

namespace App\Helpers;

use App\Models\Exercise;

class ExerciseHelper
{
    public static function getExerciseListingViewFilepath(string $exercisePath): string
    {
        $viewName = str_replace('.', '_', $exercisePath);
        return sprintf('exercise.listing.%s', $viewName);
    }

    public static function getExerciseTitle(Exercise $exercise): ?string
    {
        $underscoredPath = str_replace('.', '_', $exercise->path);

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
}
