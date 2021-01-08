<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'MainController@admin');
    Route::resource('/news', 'News\Admin\NewsController');
    Route::resource('/guest-book', 'GuestBook\Admin\GuestBookController');
});

Route::get('/', 'MainController@index')->name('news');

Route::get('/news/{id}', 'News\NewsController@index')->name('news.id');
