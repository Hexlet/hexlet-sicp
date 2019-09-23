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

        $this->app->bind(ResponseFormatter::class);

        if ($isDevEnv
            && class_exists(IdeHelperServiceProvider::class)
        ) {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        if ($isDevEnv) {
            DB::listen(
                static function ($query) {
                    info(
                        $query->sql,
                        [
                            'bind' => $query->bindings,
                            'time' => $query->time,
                        ]
                    );
                }
            );
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
