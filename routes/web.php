<?php

Route::get('sitemap.xml', 'SitemapController@index');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localizationRedirect' ],
], function () {

    Route::get('/oauth/github', 'Auth\\Social\\GithubController@redirectToProvider')->name('oauth.github');
    Route::get('/oauth/github/callback', 'Auth\\Social\\GithubController@handleProviderCallback')->name('oauth.github-callback');

    Auth::routes(['verify' => true]);
    Route::post('/dev-login', 'Auth\LoginController@devLogin')->name('auth.dev-login');

    Route::resource('/', 'WelcomeController')->only('index');
    Route::prefix('settings')->name('settings.')->namespace('Settings')->group(function () {
        Route::resource('account', 'AccountController')->only('index', 'destroy');
        Route::resource('profile', 'ProfileController')->only('index', 'update');
    });
    Route::get('/my', 'MyController')->name('my');
    Route::resource('users', 'UserController')->only('show');
    Route::resource('users.chapters', 'UserChapterController')->only('store', 'destroy');
    Route::resource('users.exercises', 'UserExerciseController')->only('store', 'update', 'destroy');
    Route::prefix('ratings')->group(function () {
        Route::resource('top', 'RatingTopController')->only('index');
        Route::resource('progress_top', 'RatingTopProgressController')->only('index');
        Route::resource('comments_top', 'RatingTopCommentsController')->only('index');
    });
    Route::resource('chapters', 'ChapterController')->only('index', 'show');
    Route::resource('exercises', 'ExerciseController')->only('index', 'show');
    Route::resource('log', 'ActivitylogController')->only('index');
    Route::resource('comments', 'CommentController')->only('store', 'update', 'show', 'destroy');
    Route::resource('solutions', 'SolutionController')->only('store', 'destroy');
});
