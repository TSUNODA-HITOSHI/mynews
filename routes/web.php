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



//課題３
Route::get('XXX','AAAControler@bbb');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
});
    //『PHP/Laravel 13 ニュース投稿画面を作成しよう』での追記
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
         Route::get('news/create', 'Admin\NewsController@add');
         Route::post('news/create', 'Admin\NewsController@create');
    });         
         
         //『PHP/Laravel 13　課題3』
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
         Route::post('profile/create' ,'Admin\ProfileController@create');
         Route::post('profile/edit' ,'Admin\ProfileController@update');
   });
   
   Route::group(['prefix' => 'admin'], function(){
       Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
       Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
       Route::get('news', 'Admin\NewsController@index')->middleware('auth');
       Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');//追記
       Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');//追記
   });
   