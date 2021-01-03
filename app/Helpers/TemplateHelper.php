<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class TemplateHelper
{
    /**
     * @param string $routeAlias
     *
     * @return bool
     */
    public static function isActiveRoute($routeAlias)
    {
        return Request::route()->getName() === $routeAlias;
    }
}
