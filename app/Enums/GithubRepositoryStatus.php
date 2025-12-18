<?php

namespace App\Enums;

enum GithubRepositoryStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Error = 'error';
}
