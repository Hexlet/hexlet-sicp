<?php

use App\Activity;

if (!function_exists('getLogItemDescription')) {

    function getLogItemDescription(Activity $logItem): string
    {
        $description = $logItem->description;
        return __('activitylog.action_' . $description);
    }
}

if (!function_exists('getExerciseTitleByItemLog')) {

    function getExerciseTitleByItemLog(Activity $logItem): string
    {
        $exercise = $logItem->subject;
        return getExerciseTitle($exercise) ?? $logItem->subject_id;
    }
}
