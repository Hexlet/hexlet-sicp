<?php

if (!function_exists('getExerciseListingViewFilepath')) {
    function getExerciseListingViewFilepath(string $exercisePath): string
    {
        $viewName = str_replace('.', '_', $exercisePath);
        return sprintf('exercise.listing.%s', $viewName);
    }
}
