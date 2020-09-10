<?php

use App\Activity;

if (!function_exists('getLogItemDescription')) {

    function getLogItemDescription(Activity $logItem, int $itemsCount = 1): string
    {
        $description = $logItem->description;
        return trans_choice("activitylog.action_{$description}", $itemsCount);
    }
}
