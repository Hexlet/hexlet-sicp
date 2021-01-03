<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class TemplateHelper
{
    public static function isActiveRoute(string $routeAlias): bool
    {
        return Request::route()->getName() === $routeAlias;
    }
}
