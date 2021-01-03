<?php

namespace App\Helpers;

use App\Models\Exercise;

class ExerciseHelper
{
    /**
     * @param string $exercisePath
     *
     * @return string
     */
    public static function getExerciseListingViewFilepath($exercisePath)
    {
        $viewName = str_replace('.', '_', $exercisePath);
        return sprintf('exercise.listing.%s', $viewName);
    }

    /**
     * @param Exercise $exercise
     *
     * @return ?string
     */
    public static function getExerciseTitle($exercise)
    {
        $underscoredPath = str_replace('.', '_', $exercise->path);

        $titleTranslatePath = "exercises/{$underscoredPath}.title";

        if (\Lang::has($titleTranslatePath)) {
            return __($titleTranslatePath);
        }

        return null;
    }

    /**
     * @param Exercise $exercise
     *
     * @return ?string
     */
    public static function getExerciseOriginLink($exercise)
    {
        $links = require resource_path('exercise-links.php');

        return $links[$exercise->path] ?? null;
    }

    /**
     * @param string $path
     *
     * @return Exercise
     */
    public static function getExercise($path)
    {
        $exercise = Exercise::query()
            ->where('path', $path)
            ->first();

        return $exercise;
    }
}
