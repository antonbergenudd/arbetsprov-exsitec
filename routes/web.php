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

Route::get('/', 'MainController@index');

Route::get('history/{stock}', 'MainController@history')->name('history');
Route::post('balance/add', 'MainController@addBalance')->name('balance.add');

Route::post('{stock}/remove/{product}', 'MainController@removeProduct')->name('product.remove');
Route::post('remove/{product}', 'MainController@removeProductTotal')->name('product.remove.total');
Route::post('product/add/new', 'MainController@addNewProduct')->name('product.add.new');
Route::post('product/add/existing', 'MainController@addExistingProduct')->name('product.add.existing');
Route::post('product/{product}/edit', 'MainController@editProduct')->name('product.edit');

Route::post('stock/{stock}/edit', 'MainController@editStock')->name('stock.edit');
Route::post('stock/{stock}/remove', 'MainController@removeStock')->name('stock.remove');
Route::post('stock/add', 'MainController@addStock')->name('stock.add');

Route::post('log/{log}/remove', 'MainController@removeLog')->name('log.remove');
Route::post('log/{log}/edit', 'MainController@editStock')->name('log.edit');
Route::post('log/add', 'MainController@addLog')->name('log.add');
