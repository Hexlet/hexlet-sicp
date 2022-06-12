<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RedirectIfProduction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return RedirectResponse|Closure
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $productionUrl = config('app.production_url');
        if (!app()->environment('production')) {
            return $next($request);
        }

        if ($request->getSchemeAndHttpHost() === $productionUrl) {
            return $next($request);
        }

        $uri = $request->getRequestUri();
        return redirect()->to("{$productionUrl}{$uri}", 301);
    }
}
