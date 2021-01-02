<?php

use App\Models\Activity;

if (!function_exists('getLogItemDescription')) {

    function getLogItemDescription(Activity $logItem): string
    {
        $itemsCount = $logItem->getExtraProperty('count');
        $description = $logItem->description;
        return trans_choice("activitylog.action_{$description}", $itemsCount, ['count' => $itemsCount]);
    }
}
