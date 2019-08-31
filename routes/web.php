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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::group(
    [
    'prefix' => 'oauth',
    'namespace' => '\\App\\Http\\Controllers\\Auth\\Social\\'
    ],
    static function () {

        Route::get('/github', 'GithubController@redirectToProvider')->name('oauth.github');
        Route::get('/github/callback', 'GithubController@handleProviderCallback')->name('oauth.github-callback');
    }
);
Route::get('/webhook', function (Request $request) {
    dump($request->all());
});
Route::get('index', 'PageController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// **************    VISUAL MANUAL TESTS    *****************
Route::get('/tests/is_leaf', function () {
    (new \Tests\Feature\ChaptersTest())->testIsLeaf();
})->name('testIsLeaf');


