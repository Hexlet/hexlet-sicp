<?php

namespace App\Helpers;

use App\Models\Activity;

class ActivityLogHelper
{
    /**
     * @param Activity $logItem
     *
     * @return string
     */
    public static function getLogItemDescription($logItem)
    {
        $itemsCount = $logItem->getExtraProperty('count');
        $description = $logItem->description;
        return trans_choice("activitylog.action_{$description}", $itemsCount, ['count' => $itemsCount]);
    }
}
