<?php

namespace App\Enums;

enum GithubRepositoryStatus: string
{
    case Active = 'active';
    case Error = 'error';
}
