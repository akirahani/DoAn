<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/introduce', 'Frontend\HomeController@introduce');
Route::get('/color', 'Frontend\HomeController@color');
Route::get('/news', 'Frontend\HomeController@news');
Route::get('/product', 'Frontend\HomeController@product');
Route::get('/product/ajax','Frontend\HomeController@filter_poduct')->name('product.ajax');
Route::post('product/consultant','Frontend\HomeController@consultant');
// Route::get('/product/category', 'Frontend\HomeController@product_category');
Route::post('/product/get', 'Frontend\HomeController@product_get');
Route::get('/contact', 'Frontend\HomeController@contact');
// detail
Route::get('/news/detail/{id}', 'Frontend\HomeController@news_detail');
Route::get('/product/detail/{id}', 'Frontend\HomeController@product_detail');
// cart
Route::get('/detail/cart','Frontend\CartController@index')->name('cart');
Route::get('/detail/cart/add/{id}', 'Frontend\CartController@addCart')->name('cart.add');
Route::post('/cart/update','Frontend\CartController@updateCart');
Route::get('/cart/delete/{id}','Frontend\CartController@delCart');

Route::post('/order/insert','Admin\OrderController@insert');
Route::post('/contact/sent','Frontend\HomeController@sent');

Route::post('/rating','Frontend\HomeController@rating');
Route::get('login','Frontend\HomeController@login');
Route::post('login/post','Frontend\HomeController@post_login');
Route::get('register','Frontend\HomeController@register');
Route::post('user/insert','Frontend\HomeController@insert_user');
Route::get('taikhoan','Frontend\HomeController@taikhoan')->name('taikhoan');
Route::get('logout','Frontend\HomeController@logout')->name('logout');
Route::post('doimatkhau','Frontend\HomeController@reset_passd');
Route::post('doithongtin','Frontend\HomeController@reset_info');

