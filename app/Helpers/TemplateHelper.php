<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('isActiveRoute')) {
    function isActiveRoute(string $routeAlias): bool
    {
        return Request::route()->getName() === $routeAlias;
    }
}
