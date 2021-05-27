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

Route::get('/', 'FrontController@index');
Route::get('/product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);
// Route::get('/homme', 'FrontController@showProductByHommes');
// Route::get('/femme', 'FrontController@showProductByFemmes');
Route::get('/soldes', 'FrontController@showProductBySoldes');

Route::get('category/{id}', 'FrontController@showProductByCategory')->name('category');
