<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index');
    
    // Route::group(['middleware' => ['auth']], function () {
    //     Route::get('/home', '');
    // });
//   });
