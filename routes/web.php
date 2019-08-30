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

Route::get('/', function () {
    return view('welcome');
});
Route::group(
    [
    'prefix' => 'oauth',
    'namespace' => '\\App\\Http\\Controllers\\Auth\\Social\\'
    ],
    static function () {

        Route::get('/github', 'GithubController@redirectToProvider');
        Route::get('/github/callback', 'GithubController@handleProviderCallback');
    }
);
