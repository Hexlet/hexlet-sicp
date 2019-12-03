<?php

use Illuminate\Support\Collection;

if (!function_exists('getLocalizedHttpsURL')) {
    function getLocalizedHttpsURL(string $localeCode): string
    {
        $url = LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
        return preg_replace("/^http:/i", "https:", $url);
    }
}
