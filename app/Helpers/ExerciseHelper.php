<?php

use App\Exercise;

if (!function_exists('getExerciseListingViewFilepath')) {
    function getExerciseListingViewFilepath(string $exercisePath): string
    {
        $viewName = str_replace('.', '_', $exercisePath);
        return sprintf('exercise.listing.%s', $viewName);
    }
}

if (!function_exists('getExerciseTitle')) {
    function getExerciseTitle(Exercise $exercise): ?string
    {
        $underscoredPath = str_replace('.', '_', $exercise->path);

        $titleTranslatePath = "exercises/{$underscoredPath}.title";

        if (Lang::has($titleTranslatePath)) {
            return __($titleTranslatePath);
        }

        return null;
    }
}

if (!function_exists('getExerciseOriginLink')) {
    function getExerciseOriginLink(Exercise $exercise): ?string
    {
        $links = require resource_path('exercise-links.php');

        return $links[$exercise->path] ?? null;
    }
}

if (!function_exists('getSeeExerciseLink')) {
    function getSeeExerciseLink(string $path): string
    {
        $target = Exercise::all()
            ->where('path', $path)
            ->pluck('id')
            ->first();

        return $target;
    }
}
