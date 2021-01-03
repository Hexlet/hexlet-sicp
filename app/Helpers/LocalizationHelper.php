<?php

namespace App\Helpers;

class LocalizationHelper
{
    /**
     * @param string $localeCode
     *
     * @return string
     */
    public static function getLocalizedHttpsURL($localeCode)
    {
        $url = \LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
        $environment = app()->environment();
        return $environment === 'production' ? preg_replace("/^http:/i", "https:", $url) : $url;
    }

    /**
     * @param string $currentLocale
     *
     * @return string
     */
    public static function getPathToLocaleFlag($currentLocale)
    {
        return asset("icons/flags/{$currentLocale}.svg");
    }

    /**
     * @param string $currentLocale
     *
     * @return string
     */
    public static function getLocalizedURL($currentLocale)
    {
        return \LaravelLocalization::getLocalizedURL($currentLocale);
    }

    /**
     * @param string $currentLocale
     * @param array $locales
     *
     * @return array
     */
    public static function getOtherLocales($currentLocale, $locales)
    {
        return array_filter(
            $locales,
            function ($locale) use ($currentLocale) {
                return $locale !== $currentLocale;
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    /**
     * @param string $currentLocale
     *
     * @return string
     */
    public static function getNativeLanguageName($currentLocale)
    {
        $locales = \LaravelLocalization::getSupportedLocales();
        return normalizeNativeLanguageName($locales[$currentLocale]['native']);
    }

    /**
     * @param string $language
     * @param string $encoding
     *
     * @return string
     */
    public static function normalizeNativeLanguageName($language, $encoding = 'utf-8')
    {
        // multi-bytes strtolower()
        $lower = mb_strtolower($language, $encoding);

        // multi-bytes version of ucfirst()
        $upperFirstChar = mb_strtoupper(mb_substr($lower, 0, 1));
        $result = $upperFirstChar . mb_substr($lower, 1);

        return $result;
    }
}
