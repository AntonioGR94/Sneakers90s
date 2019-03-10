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

// Páginas estáticas
Route::get('/', 'PagesController@index')->name('root');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/about', 'PagesController@about')->name('about');

// Rutas para la entidad Sneakers
Route::resource('/sneakers', 'SneakersController');
Route::resource('/brands', 'BrandController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}/sneakers', 'UserSneakersController@index')->name('mysneakers.index');

Route::get('/orders', 'OrderController@index');
Route::get('/orders/buy', 'OrderController@store');
