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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => ['auth']], function(){//middlewareのグループかして囲む、]);まで ログインされてない状態で不正にアクセスできなくするため

//topページ表示
Route::get('/top','PostsController@index');
//投稿機能
Route::post('/create','PostsController@create');
//投稿編集
Route::post('/update/{id}','PostsController@update')->name('posts.update');
//投稿削除
Route::get('post/{id}/delete/','PostsController@delete')->name('posts.delete');

//プロフィールページ移行
Route::get('/profile','UsersController@profile');
//プロフィール更新
Route::post('/profile','UsersController@profileup')->name('users.profileup');


Route::get('/search','UsersController@search');

Route::post('/top','UsersController@postCounts')->name('postCounts');


// Route::post('/top','PostsController@store')->name('posts.store');


Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');
//ログアウト機能
Route::get('/logout','Auth\LoginController@logout');
});

//投稿フォームのやつ↓
//表示用
// Route::post('/top','PostsController@create')->name('posts.create');
//投稿を押した時
// Route::post('/top','PostsController@store')->name('posts.store');

