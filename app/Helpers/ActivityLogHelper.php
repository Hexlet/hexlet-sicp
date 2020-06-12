<?php

use App\Activity;

if (!function_exists('getLogItemDescription')) {

    function getLogItemDescription(Activity $logItem): string
    {
        $description = $logItem->description;
        return __('activitylog.action_' . $description);
    }
}
