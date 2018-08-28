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
use App\Http\Middleware\LoginMiddleware;

Route::get('/', function () {
    return view('top');
});
Route::resource('articles', 'ArticlesController')
->middleware(LoginMiddleware::class);

// Route::get('/', 'startController@index');

//twitter認証
Route::get('/login', 'LoginController@twitter');

//コールバック
Route::get('/login/twitter/callback', 'LoginController@twitterCallback');

//twitter認証の解除
Route::get('/logout', 'LoginController@twitterLogout');