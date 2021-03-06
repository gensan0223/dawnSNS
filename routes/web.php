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

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('auth.login');
Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
Route::get('/register', 'Auth\RegisterController@register')->name('auth.register');
Route::post('/register', 'Auth\RegisterController@register')->name('auth.register');
Route::get('/added', 'Auth\RegisterController@added')->name('auth.added');

//ログイン中のページ
Route::group(['middleware'=>['auth']], function(){
    Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');
    Route::get('/top','PostsController@index')->name('posts.top');
    Route::get('/profile/{id}','UsersController@profile')->name('users.profile');
    Route::get('/search','UsersController@search')->name('users.search');
    Route::get('/follow-list','FollowsController@followList')->name('follows.followList');
    Route::get('/follower-list','FollowsController@followerList')->name('follows.followerList');
    Route::post('/follow','FollowsController@follow')->name('follows.follow');
    Route::post('/store', 'PostsController@store')->name('posts.store');
    Route::post('/delete/{id}', 'PostsController@destroy')->name('posts.destroy');
    Route::post('/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::get('/selfProfile', 'PostsController@showSelfProfile')->name('posts.selfProfile');
    Route::post('/getSelfProfile', 'PostsController@getSelfProfile')->name('posts.getSelfProfile');
});

Auth::routes();

