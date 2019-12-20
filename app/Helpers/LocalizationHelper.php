<?php

use Illuminate\Support\Collection;

if (!function_exists('getLocalizedHttpsURL')) {
    function getLocalizedHttpsURL(string $localeCode): string
    {
        $url = LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
        $environment = app()->environment();
        return $environment === 'production' ? preg_replace("/^http:/i", "https:", $url) : $url;
    }
}

if (!function_exists('getPathToLocaleFlag')) {
    function getPathToLocaleFlag(string $currentLocale): string
    {
        return asset("icons/flags/{$currentLocale}.svg");
    }
}

if (!function_exists('getLocalizedURL')) {
    function getLocalizedURL(string $currentLocale): string
    {
        return LaravelLocalization::getLocalizedURL($currentLocale);
    }
}

if (!function_exists('getOtherLocales')) {
    function getOtherLocales($currentLocale, $locales)
    {
        return array_filter(
            $locales,
            function ($locale) use ($currentLocale) {
                return $locale !== $currentLocale;
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}

if (!function_exists('getNativeLanguageName')) {
    function getNativeLanguageName(string $currentLocale): string
    {
        $locales = LaravelLocalization::getSupportedLocales();
        return normalizeNativeLanguageName($locales[$currentLocale]['native']);
    }
}

if (!function_exists('normalizeNativeLanguageName')) {
    function normalizeNativeLanguageName(string $language, $encoding = 'utf-8'): string
    {
        // multi-bytes strtolower()
        $lower = mb_strtolower($language, $encoding);

        // multi-bytes version of ucfirst()
        $upperFirstChar = mb_strtoupper(mb_substr($lower, 0, 1));
        $result = $upperFirstChar . mb_substr($lower, 1);

        return $result;
    }
}
