<?php

use Illuminate\Support\Facades\Route;

Route::namespace('User')->group(function () {
    Route::get('/', function () {
        return view('frontend.index');  
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login')->name('user.login');
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', 'HomeController@index');
    });
  });


});
