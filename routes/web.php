<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses'=>'Front\FrontEndController@index','as'=>'index']);
Route::get('single/{id}', ['uses'=>'Front\FrontEndController@singleProduct','as'=>'single']);
Route::post('/cart/add', ['uses' => 'Front\ShoppingController@add_to_cart','as' => 'cart.add']);
Route::get('/cart', ['uses' => 'Front\ShoppingController@cart','as' => 'cart']);
Route::get('/cart/delete/{id}', ['uses' => 'Front\ShoppingController@cart_delete','as' => 'cart.delete']);
Route::get('cart/incr/{id}/{qty}', ['uses' => 'Front\ShoppingController@incr','as' => 'cart.incr']);
Route::get('cart/decr/{id}/{qty}', ['uses' => 'Front\ShoppingController@decr','as' => 'cart.decr']);
Route::get('/cart/rapid/add/{id}', ['uses' => 'Front\ShoppingController@rapid_add','as' => 'cart.rapid.add']);
Route::get('/cart/checkout', ['uses' => 'Front\CheckoutController@index','as' => 'cart.checkout']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('permission', 'Admin\PermissionController',['middleware'=>'permission:All Permission|Permission Management']);
    Route::resource('role', 'Admin\RoleController',['middleware'=>'permission:All Permission|Role Management']);
    Route::resource('author', 'Admin\AuthorController',['middleware'=>'permission:All Permission|User Management']);
    Route::resource('setting', 'Admin\SettingController',['middleware'=>'permission:All Permission|Settings Management']);
    Route::resource('category', 'Admin\CategoryController',['middleware'=>'permission:All Permission|Category Management']);
    Route::put('/category/status/{id}', ['uses'=>'Admin\CategoryController@status','as'=>'category.status', 'middleware'=>'permission:All Permission|Category Management'] );
    Route::resource('product', 'Admin\ProductController',['middleware'=>'permission:All Permission|Products Management']);
    Route::put('/product/status/{id}', ['uses'=>'Admin\ProductController@status','as'=>'product.status','middleware'=>'permission:All Permission|Products Management'] );
});