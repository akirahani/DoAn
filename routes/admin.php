<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::middleware('auth:admin')->group(function (){
    Route::get('/home', 'Admin\HomeController@index')->name('dashboard');
    Route::get('/logout','Admin\Auth\LogoutController@logout');
    Route::get('/san-pham','Admin\ProductController@index');
});
