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
    //課題4
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
});