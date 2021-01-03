<?php

namespace App\Helpers;

use LaravelLocalization;

class LocalizationHelper
{
    public static function getLocalizedHttpsURL(string $localeCode): string
    {
        $url = LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
        $environment = app()->environment();
        return $environment === 'production' ? preg_replace("/^http:/i", "https:", $url) : $url;
    }

    public static function getPathToLocaleFlag(string $currentLocale): string
    {
        return asset("icons/flags/{$currentLocale}.svg");
    }

    public static function getLocalizedURL(string $currentLocale): string
    {
        return LaravelLocalization::getLocalizedURL($currentLocale);
    }

    public static function getOtherLocales(string $currentLocale, array $locales): array
    {
        return array_filter(
            $locales,
            function ($locale) use ($currentLocale) {
                return $locale !== $currentLocale;
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    public static function getNativeLanguageName(string $currentLocale): string
    {
        $locales = LaravelLocalization::getSupportedLocales();
        return normalizeNativeLanguageName($locales[$currentLocale]['native']);
    }

    public static function normalizeNativeLanguageName(string $language, string $encoding = 'utf-8'): string
    {
        // multi-bytes strtolower()
        $lower = mb_strtolower($language, $encoding);

        // multi-bytes version of ucfirst()
        $upperFirstChar = mb_strtoupper(mb_substr($lower, 0, 1));
        $result = $upperFirstChar . mb_substr($lower, 1);

        return $result;
    }
}
