<?php

use App\Http\Controllers\Chapter\ChapterMemberController;

Route::get('sitemap.xml', 'SitemapController@index');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ],
], function (): void {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/oauth/github', 'Auth\\Social\\GithubController@redirectToProvider')->name('oauth.github');
    Route::get('/oauth/github/callback', 'Auth\\Social\\GithubController@handleProviderCallback')->name('oauth.github-callback');

    Route::get('/oauth/yandex', 'Auth\\Social\\YandexController@redirectToProvider')->name('oauth.yandex');
    Route::get('/oauth/yandex/callback', 'Auth\\Social\\YandexController@handleProviderCallback')->name('oauth.yandex-callback');

    Auth::routes(['verify' => true]);
    Route::post('/dev-login', 'Auth\LoginController@devLogin')->name('auth.dev-login');

    Route::singleton('my', 'MyController')->only('show');
    Route::namespace('My')->prefix('my')->name('my.')->group(function (): void {
        Route::resource('solutions', 'SolutionController')->only('index');
    });

    Route::namespace('Settings')->prefix('settings')->name('settings.')->group(function (): void {
        Route::resource('account', 'AccountController')->only('index', 'destroy');
        Route::resource('profile', 'ProfileController')->only('index', 'update');
    });

    Route::resource('users', 'UserController')->only('show');
    Route::namespace('User')->group(function (): void {
        Route::resource('users.solutions', 'SolutionController')->only('store', 'show', 'destroy');
        Route::resource('users.comments', 'UserCommentController')->only('index');
    });

    Route::namespace('Rating')->prefix('ratings')->group(function (): void {
        Route::resource('top', 'TopController')->only('index');
        Route::resource('comments_top', 'CommentController')->only('index');
    });

    Route::resource('solutions', 'SolutionController')->only('index', 'show');
    Route::namespace('Chapter')->prefix('chapters/{chapter}')->group(function (): void {
        Route::put('members/finish', [ChapterMemberController::class, 'finish'])
            ->name('chapters.members.finish');
    });

    Route::resource('chapters', 'ChapterController')->only('index', 'show');
    Route::resource('exercises', 'ExerciseController')->only('index', 'show');
    Route::resource('log', 'ActivityController')->only('index');
    Route::resource('comments', 'CommentController')->only('index', 'store', 'update', 'show', 'destroy');
    Route::resource('pages', 'PagesController')->only('show');

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin')->group(function (): void {
        Route::resource('users', 'UserController')->only('index');
        Route::resource('comments', 'CommentController')->only('index');
        Route::resource('solutions', 'SolutionController')->only('index');
    });

    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
});
