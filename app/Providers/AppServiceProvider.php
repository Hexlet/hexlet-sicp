<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;
use DB;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('logging.log_sql_queries')) {
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

        Blade::include('components.comments', 'comments');
    }
}
