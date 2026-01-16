<?php

namespace App\Enums;

enum SyncDirection: string
{
    case ToGithub = 'to_github';
    case FromGithub = 'from_github';
}
