<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::middleware('auth:admin')->group(function(){
    Route::get('/home', 'Admin\HomeController@index')->name('dashboard');
    Route::get('/logout','Admin\Auth\LogoutController@logout');
    //product
    Route::get('/product','Admin\ProductController@index')->name('admin.product');
    Route::get('/product/insert','Admin\ProductController@insert')->name('admin.product.insert');
    Route::post('/product/store','Admin\ProductController@store')->name('admin.product.store');
    Route::get('/product/edit/{id}','Admin\ProductController@edit')->name('admin.product.edit');
    Route::post('/product/update','Admin\ProductController@update');
    Route::get('/product/delete/{id}','Admin\ProductController@delete');
});
