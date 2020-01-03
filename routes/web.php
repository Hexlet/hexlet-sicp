<?php

Route::get('sitemap.xml', 'SitemapController@index');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localizationRedirect' ],
], function () {
    Auth::routes(['verify' => true]);
    Route::resource('/', 'WelcomeController')->only('index');
    Route::group(
        [
            'prefix' => 'oauth',
            'namespace' => '\\App\\Http\\Controllers\\Auth\\Social\\',
        ],
        static function () {
            Route::get('/github', 'GithubController@redirectToProvider')->name('oauth.github');
            Route::get('/github/callback', 'GithubController@handleProviderCallback')->name('oauth.github-callback');
        }
    );
    Route::middleware('auth')->group(function () {
        Route::resource('users.chapters', 'UserChapterController')->only('store');
        Route::get('/my', 'MyController')->name('my');
        Route::resource('account', 'AccountController')->only('index', 'edit', 'update', 'destroy');
        Route::get('/account/delete', 'AccountController@delete')->name('account.delete');
    });
    Route::resource('users', 'UserController')->only('show');
    Route::resource('ratings', 'RatingController')->only('index');
    Route::resource('chapters', 'ChapterController')->only('index', 'show');
    Route::resource('exercises', 'ExerciseController')->only('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('log', 'ActivitylogController')->only('index');
});
