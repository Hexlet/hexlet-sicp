<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $environment = $this->app->environment();

        $isDevEnv = $environment !== 'production';

        if (!$isDevEnv) {
            \URL::forceScheme('https');
        }

        if ($isDevEnv) {
            DB::listen(function ($query) {
                    info($query->sql, [
                            'bind' => $query->bindings,
                            'time' => $query->time,
                        ]);
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
