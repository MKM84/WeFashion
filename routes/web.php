<?php


Route::get('/', 'FrontController@index');
Route::get('/product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);
Route::get('/soldes', 'FrontController@showProductBySoldes');
Route::get('category/{id}', 'FrontController@showProductByCategory')->name('category');


Auth::routes();


Route::resource('/admin/product', 'ProductController')->middleware('auth');

Route::resource('/admin/category', 'CategoryController')->middleware('auth');

Route::redirect('/admin', '/login');