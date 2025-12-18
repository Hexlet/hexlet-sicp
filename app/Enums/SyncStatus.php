<?php

namespace App\Enums;

enum SyncStatus: string
{
    case Success = 'success';
    case Failed = 'failed';
    case Skipped = 'skipped';
}
