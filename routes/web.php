<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Auth::routes(['verify' => true]);
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
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
    Route::get('/home', 'HomeController@index')->name('home');
});
