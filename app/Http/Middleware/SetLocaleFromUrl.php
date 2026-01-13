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

        if ($locale) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
