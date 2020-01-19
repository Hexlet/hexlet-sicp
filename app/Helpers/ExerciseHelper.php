<?php
if (!function_exists('getExerciseListingViewFilepath')) {
    function getExerciseListingViewFilepath(string $exercisePath): string
    {
        $viewName = str_replace('.', '_', $exercisePath);
        return sprintf('exercise.listing.%s', $viewName);
    }
}

if (!function_exists('getExerciseDescription')) {
    function getExerciseDescription(string $exercisePath): string
    {
        return  __('sicp.exercises')[$exercisePath] ?? __('sicp.exercises.' . $exercisePath);
    }
}
