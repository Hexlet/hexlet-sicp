<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use LaravelLocalization;

class SetLocaleFromUrl
{
    public function handle(Request $request, Closure $next)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        \Log::info('SetLocaleFromUrl middleware', [
            'current_locale' => $locale,
            'url' => $request->url(),
            'app_locale_before' => app()->getLocale(),
        ]);

        if ($locale) {
            app()->setLocale($locale);
            \Log::info('Locale set to: ' . $locale);
        }

        return $next($request);
    }
}
