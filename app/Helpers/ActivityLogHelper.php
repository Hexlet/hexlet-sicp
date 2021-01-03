<?php

namespace App\Helpers;

use App\Models\Activity;

class ActivityLogHelper
{
    public static function getLogItemDescription(Activity $logItem): string
    {
        $itemsCount = $logItem->getExtraProperty('count');
        $description = $logItem->description;
        return trans_choice("activitylog.action_{$description}", $itemsCount, ['count' => $itemsCount]);
    }
}
