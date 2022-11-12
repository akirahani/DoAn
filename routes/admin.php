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
        Route::get('/config/add', 'Admin\ConfigController@add')->name('config.add');
        Route::post('/config/insert', 'Admin\ConfigController@insert')->name('news.insert');
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
        // unit
        Route::get('/unit','Admin\UnitController@index')->name('admin.unit');
        Route::get('/unit/insert','Admin\UnitController@add')->name('admin.unit.insert');
        Route::post('/unit/store','Admin\UnitController@insert')->name('admin.unit.store');
        Route::get('/unit/edit/{id}','Admin\UnitController@edit')->name('admin.unit.edit');
        Route::post('/unit/update','Admin\UnitController@update');
        Route::get('/unit/delete/{id}','Admin\UnitController@delete');
        //trademark
        Route::get('/trademark','Admin\TrademarkController@index')->name('admin.trademark');
        Route::get('/trademark/add','Admin\TrademarkController@insert')->name('admin.trademark.insert');
        Route::post('/trademark/insert','Admin\TrademarkController@store')->name('admin.trademark.store');
        Route::get('/trademark/edit/{id}','Admin\TrademarkController@edit')->name('admin.trademark.edit');
        Route::post('/trademark/update','Admin\TrademarkController@update');
        Route::get('/trademark/delete/{id}','Admin\TrademarkController@delete');
        //category
        Route::get('/category','Admin\CategoryController@index')->name('admin.category');
        Route::get('/category/add','Admin\CategoryController@add')->name('admin.category.insert');
        Route::post('/category/insert','Admin\CategoryController@insert')->name('admin.category.store');
        Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('/category/update','Admin\CategoryController@update');
        Route::get('/category/delete/{id}','Admin\CategoryController@delete');
        // order
        Route::get('/order','Admin\OrderController@index')->name('admin.order');
        Route::get('/order/detail/{id}','Admin\OrderController@detail')->name('admin.order.detail');
        Route::post('/order/call/{id}','Admin\OrderController@get_call')->name('admin.order.call');
        Route::get('/order/call/detail/{id}','Admin\OrderController@detail_call')->name('admin.order.call.detail');
        Route::get('/order/confirm/{id}','Admin\OrderController@order_confirm')->name('admin.order.confirm');
        Route::post('/order/response','Admin\OrderController@action_response')->name('admin.order.response');

        Route::get('/order/final/{id}','Admin\OrderController@order_final')->name('admin.order.final');
        Route::post('/order/closing','Admin\OrderController@order_closing')->name('admin.order.closing');

        Route::get('/order/cancel','Admin\OrderController@order_cancel')->name('admin.order.cancel');
        Route::get('/order/finish','Admin\OrderController@order_finish')->name('admin.order.finish');
        // cancel
        Route::get('/cancel','Admin\OrderController@cancel')->name('admin.cancel');
        Route::get('/cancel/insert','Admin\OrderController@cancel_add')->name('admin.cancel.insert');
        Route::post('/cancel/store','Admin\OrderController@cancel_insert')->name('admin.cancel.store');
        Route::get('/cancel/edit/{id}','Admin\OrderController@cancel_edit')->name('admin.cancel.edit');
        Route::post('/cancel/update','Admin\OrderController@cancel_update');
        Route::get('/cancel/delete/{id}','Admin\OrderController@cancel_delete');
        // storage
        Route::get('/storage','Admin\StorageController@index')->name('admin.storage');
        Route::get('/storage/import','Admin\StorageController@import')->name('admin.storage.import');
        Route::get('/storage/export','Admin\StorageController@export')->name('admin.storage.export');
        Route::get('/storage/import/add','Admin\StorageController@import_add')->name('admin.storage.import.add');
        Route::post('/storage/import/insert','Admin\StorageController@import_insert');
        Route::get('/storage/import/edit','Admin\StorageController@import_edit');
        Route::get('/storage/import/delete','Admin\StorageController@import_delete');
        Route::post('/storage/import/view','Admin\StorageController@import_view')->name('admin.storage.import.view');
        Route::get('/storage/export/add','Admin\StorageController@export_add')->name('admin.storage.export.add');
        Route::post('/storage/export/insert','Admin\StorageController@export_insert');
        Route::get('/storage/export/edit','Admin\StorageController@export_edit');
        Route::get('/storage/export/delete','Admin\StorageController@export_delete');
        Route::post('/storage/export/view','Admin\StorageController@export_view')->name('admin.storage.export.view');
        Route::get('/storage/phieuchi','Admin\StorageController@phieu_chi')->name('admin.storage.import.phieuchi');
        // Route::post('/storage/insert','Admin\CategoryController@insert')->name('admin.category.store');
        // Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
        // Route::post('/category/update','Admin\CategoryController@update');
        Route::get('customer','Admin\CustomerController@index')->name('khach.index');
        Route::get('customer/add','Admin\CustomerController@add');
        Route::post('customer/insert','Admin\CustomerController@insert');
        Route::get('customer/edit/{id}','Admin\CustomerController@edit');
        Route::post('customer/update','Admin\CustomerController@update');
        Route::get('customer/delete/{id}','Admin\CustomerController@delete');
        // 
        Route::get('tuvan','Admin\CustomerController@tuvan')->name('khach.tuvan');
        Route::post('tuvan/add','Admin\CustomerController@tuvan_add')->name('khach.tuvan.add');
        // supplier
        Route::get('supplier','Admin\SupplierController@index')->name('admin.supplier');
        Route::get('supplier/add','Admin\SupplierController@add')->name('admin.supplier.add');
        Route::post('supplier/insert','Admin\SupplierController@insert')->name('admin.supplier.insert');
        Route::get('supplier/edit/{id}','Admin\SupplierController@edit')->name('admin.supplier.edit');
        Route::post('supplier/update','Admin\SupplierController@update');
        Route::get('supplier/delete/{id}','Admin\SupplierController@delete');
        Route::post('/storage/import/chi','Admin\StorageController@import_chi')->name('admin.storage.import.chi');
        Route::post('/storage/import/save_chi','Admin\StorageController@save_chi')->name('admin.save_chi');

        // load data san pham tu nha cung cap
        Route::post('load/product','Admin\StorageController@load_product');
        Route::post('/storage/chi/view','Admin\StorageController@pchi_view')->name('admin.storage.chi.view');
        // Ban hang truc tiep
        Route::get('sell','Admin\SellController@index')->name('sell.index');
        Route::get('sell/add','Admin\SellController@add');
        Route::post('sell/insert','Admin\SellController@insert_order_offline');
        Route::get('sell/edit/{id}','Admin\SellController@edit');
        Route::get('sell/update','Admin\SellController@update');
        //Loai khach
        Route::get('customer/loai','Admin\LoaiKhachController@index')->name('loai.index');
        Route::get('customer/loai/add','Admin\LoaiKhachController@add');
        Route::post('customer/loai/insert','Admin\LoaiKhachController@insert');
        Route::get('customer/loai/edit/{id}','Admin\LoaiKhachController@edit');
        Route::post('customer/loai/update','Admin\LoaiKhachController@update');
        Route::get('customer/loai/delete/{id}','Admin\LoaiKhachController@delete');
    // });
 
});
