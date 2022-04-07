<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index');
Route::get('/introduce', 'Frontend\HomeController@introduce');
Route::get('/news', 'Frontend\HomeController@news');
Route::get('/product', 'Frontend\HomeController@product');
Route::get('/contact', 'Frontend\HomeController@contact');
// detail
Route::get('/news/detail/{id}', 'Frontend\HomeController@news_detail');
Route::get('/product/detail/{id}', 'Frontend\HomeController@product_detail');
    // Route::group(['middleware' => ['auth']], function () {
    //     Route::get('/home', '');
    // });
//   });
