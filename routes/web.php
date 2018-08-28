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
/*
 * HaruReview
 * 今回はセッションに値を保持して、その値を確認する形でログインを実装しておりましたが、
 * 僕たちが案件でログイン認証を実装する場合は、Auth認証を使用するパターンしか無いかと思います。
 * 次回実装する場合は、Auth認証を実装してみてください！
 * Auth認証の場合、Twitterの認証もやり方が変わってくると思います。
 */


Route::resource('articles', 'ArticlesController')
->middleware(LoginMiddleware::class);

/*
 * HaruReview
 * middlewareの定義をここで直接、クラスを指定しておりますが、僕がmiddlewareを使用する場合は、app/Http/Kernel.phpファイルで短縮キーを定義して
 * その値を使用するようにしてます。（理由としてはmiddlewareを定義する箇所を「app/Http/Kernel.php」で定義するものだと固定化するため、route以外で使用する場合もその短縮キーで呼び出せるため。）
 * 次回実装する際には、app/Http/Kernel.phpファイルで短縮キーを定義して実装してみてください。
 */

// Route::get('/', 'startController@index');

//twitter認証
Route::get('/login', 'LoginController@twitter');

//コールバック
Route::get('/login/twitter/callback', 'LoginController@twitterCallback');

//twitter認証の解除
Route::get('/logout', 'LoginController@twitterLogout');