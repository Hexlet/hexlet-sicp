<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class TemplateHelper
{
    public static function isActiveRoute(string $routeAlias): bool
    {
        /** @var \Illuminate\Routing\Route */
        $currentRoute = Request::route();

        return $currentRoute->getName() === $routeAlias;
    }

    public static function getTitleContent(string $header): string
    {
        $name = __('layout.title.name_SICP');
        return "{$header} - {$name}";
    }
}
