<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invoice/all', 'InvoiceController@all')->name('invoice.all');
Route::post('/invoice/search/{date?}', 'InvoiceController@search')->name('invoice.search');

Route::get('/product', 'ProductController@index')->name('product.index');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::post('/product/{id}/update', 'ProductController@update')->name('product.update');

Route::get('/invoice/store', 'InvoiceController@store')->name('invoice.store');
Route::get('/invoice/{no_inv}', 'InvoiceController@update')->name('invoice.update');

Route::post('/invoice-detail/{inv_id}/store', 'InvoiceController@detail')->name('detail.store');
Route::get('/invoice-detail/{detail_id}/destroy', 'InvoiceController@destroy')->name('detail.destroy');
Route::get('/invoice/{no_inv}/details', 'InvoiceController@bayar')->name('invoice.details');

