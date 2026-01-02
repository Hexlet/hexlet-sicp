<?php

namespace App\Enums;

enum SyncType: string
{
    case Webhook = 'webhook';
    case Manual = 'manual';
    case Initial = 'initial';
}
