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

// Route::get('/index', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index'); //首頁
//               某控制器名稱內的函式名稱

Route::get('/news', 'FrontController@news'); //新聞頁
Route::get('/news_info/{news_id}', 'FrontController@news_info'); //新聞內頁
Route::get('/contact_us', 'FrontController@contact_us'); //聯絡我們

Route::post('/store_contact','FrontController@store_contact');

Auth::routes(['register'=>false,'reset=>false'] );

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/admin/news', 'HomeController@index')->middleware('auth');




Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store', 'NewsController@store');
    Route::get('news/edit/{news_id}', 'NewsController@edit');
    Route::post('news/update/{news_id}', 'NewsController@update');
    Route::get('news/destroy/{news_id}', 'NewsController@destroy');
});


