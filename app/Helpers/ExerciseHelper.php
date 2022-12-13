<?php

namespace App\Helpers;

use App\Models\Exercise;

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
}
