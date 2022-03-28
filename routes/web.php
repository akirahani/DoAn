<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index');
Route::get('/introduce', 'Frontend\HomeController@introduce');
    // Route::group(['middleware' => ['auth']], function () {
    //     Route::get('/home', '');
    // });
//   });
