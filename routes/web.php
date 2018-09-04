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

Route::get('/', 'IndexController@index');
Route::get('/catalog', 'IndexController@catalog');
Route::get('/contact', 'IndexController@contact');
Route::get('/about', 'IndexController@about');
Route::get('/catalog/{slug}', 'IndexController@getCategory');
Route::get('/product/{slug}', 'IndexController@getProduct');
Route::get('/category/{slug}', 'IndexController@singleCategory');
Route::post('/send-order', 'IndexController@sendOrder');
Route::post('/send-message', 'IndexController@sendMessage');
Route::post('/send-interview', 'IndexController@sendInterview');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/add', 'HomeController@addProduct');
Route::post('/home/edit', 'HomeController@editProduct');
Route::post('/home/delete', 'HomeController@deleteProduct');
Route::get('/home/refresh', 'HomeController@refreshTable');
