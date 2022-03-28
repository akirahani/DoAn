<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::middleware('auth:admin')->group(function(){
    Route::get('/home', 'Admin\HomeController@index')->name('dashboard');
    Route::get('/logout','Admin\Auth\LogoutController@logout');
    // Route::middleware(['check.permission'])->group(function(){
        Route::get('/home', 'Admin\HomeController@index')->name('dashboard');
   
        // person
        Route::get('/account','Admin\PersonController@index')->name('account.index');
        Route::get('/account/add','Admin\PersonController@add')->name('account.add');
        Route::post('/account/insert','Admin\PersonController@insert')->name('account.insert');
        Route::get('/account/edit/{id}','Admin\PersonController@edit')->name('account.edit');
        Route::post('/account/update','Admin\PersonController@update')->name('account.update');
        Route::get('/account/delete/{id}','Admin\PersonController@delete')->name('account.delete');
        //permission_role
        Route::get('/role','Admin\RoleController@index')->name('role.index');
        Route::get('/role/add','Admin\RoleController@add')->name('role.add');
        Route::post('/role/insert','Admin\RoleController@insert')->name('role.insert');
        Route::get('/role/edit/{id}','Admin\RoleController@edit')->name('role.edit');
        Route::post('/role/update','Admin\RoleController@update')->name('role.update');
        Route::get('/role/delete/{id}','Admin\RoleController@delete')->name('role.delete');
        Route::get('/permission/add','Admin\RoleController@permission')->name('permission.add');
        Route::post('/permission/insert','Admin\RoleController@permission_insert')->name('permission.insert');
        // news
        Route::get('/news', 'Admin\NewsController@index')->name('news.index');
        Route::get('/news/add', 'Admin\NewsController@add')->name('news.add');
        Route::post('/news/insert', 'Admin\NewsController@insert')->name('news.insert');
        Route::post('/news/upload', 'Admin\NewsController@upload')->name('news.add');
        Route::get('/news/edit/{id}','Admin\NewsController@edit')->name('news.edit');
        Route::post('/news/update','Admin\NewsController@update')->name('news.update');
        Route::get('/news/delete/{id}','Admin\NewsController@delete')->name('news.delete');
        //config
        Route::get('/config', 'Admin\ConfigController@index')->name('config.index');
        Route::get('/config/edit/{id}','Admin\ConfigController@edit')->name('config.edit');
        Route::post('/config/update','Admin\ConfigController@update')->name('config.update');
        //navbar
        Route::get('/navbar', 'Admin\NavbarController@index')->name('navbar.index');
        Route::get('/navbar/add', 'Admin\NavbarController@add')->name('navbar.add');
        Route::post('/navbar/insert', 'Admin\NavbarController@insert')->name('navbar.insert');
        Route::get('/navbar/edit/{id}','Admin\NavbarController@edit')->name('navbar.edit');
        Route::post('/navbar/update','Admin\NavbarController@update')->name('navbar.update');
        Route::get('/navbar/delete/{id}','Admin\NavbarController@delete')->name('navbar.delete');
        //product
        Route::get('/product','Admin\ProductController@index')->name('admin.product');
        Route::get('/product/insert','Admin\ProductController@insert')->name('admin.product.insert');
        Route::post('/product/store','Admin\ProductController@store')->name('admin.product.store');
        Route::get('/product/edit/{id}','Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('/product/update','Admin\ProductController@update');
        Route::get('/product/delete/{id}','Admin\ProductController@delete');
        //trademark
        Route::get('/trademark','Admin\TrademarkController@index')->name('admin.trademark');
        Route::get('/trademark/insert','Admin\TrademarkController@insert')->name('admin.trademark.insert');
        Route::post('/trademark/store','Admin\TrademarkController@store')->name('admin.trademark.store');
        Route::get('/trademark/edit/{id}','Admin\TrademarkController@edit')->name('admin.trademark.edit');
        Route::post('/trademark/update','Admin\TrademarkController@update');
        Route::get('/trademark/delete/{id}','Admin\TrademarkController@delete');
        //category
        Route::get('/category','Admin\CategoryController@index')->name('admin.category');
        Route::get('/category/insert','Admin\CategoryController@insert')->name('admin.category.insert');
        Route::post('/category/store','Admin\CategoryController@store')->name('admin.category.store');
        Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('/category/update','Admin\CategoryController@update');
        Route::get('/category/delete/{id}','Admin\CategoryController@delete');
    // });
 
});
