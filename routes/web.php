<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('producttype/{id}','HomeController@getListProductType');
Route::get('{slug}.html','HomeController@getProductDetail');
Route::get('checkout','HomeController@checkout');
Route::get('profile','HomeController@profile');
Route::post('update','UserController@updateUser');
Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');
Route::post('buy','OrderController@postBuyy');
Route::get('history','OrderController@getHistory');
Route::get('order_detail/{id}','OrderController@orderDetail');
Route::group(['prefix' => 'admin','middleware'=>'adminMiddleware'], function () {
    Route::get('index','DashBoardController@dashBoard');
    Route::group(['prefix' => 'category'], function () {
        Route::get('list', 'CategoryController@getList');
        Route::get('add', 'CategoryController@getAdd');
        Route::post('add', 'CategoryController@postAdd');
        Route::get('edit/{id}', 'CategoryController@getEdit');
        Route::post('edit/{id}', 'CategoryController@postEdit');
        Route::get('delete/{id}', 'CategoryController@getDelete');
    });
    Route::group(['prefix' => 'producttype'], function () {
        Route::get('list', 'ProductTypeController@getList');
        Route::get('add', 'ProductTypeController@getAdd');
        Route::post('add', 'ProductTypeController@postAdd');
        Route::get('edit/{id}', 'ProductTypeController@getEdit');
        Route::post('edit/{id}', 'ProductTypeController@postEdit');
        Route::get('delete/{id}', 'ProductTypeController@getDelete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('list', 'ProductController@getList');
        Route::get('add', 'ProductController@getAdd');
        Route::post('add', 'ProductController@postAdd');
        Route::get('edit/{id}', 'ProductController@getEdit');
        Route::post('edit/{id}', 'ProductController@postEdit');
        Route::get('delete/{id}', 'ProductController@getDelete');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', 'UserController@getListAdmin');
        Route::get('add', 'UserController@getAddAdmin');
        Route::post('add', 'UserController@postAddAdmin');
        Route::get('edit/{id}', 'UserController@getEditAdmin');
        Route::post('edit/{id}', 'UserController@postEditAdmin');
        Route::get('delete/{id}', 'UserController@getDeleteAdmin');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('list', 'OrderController@getList');
        Route::get('edit/{id}', 'OrderController@getEdit');
        Route::post('edit/{id}', 'OrderController@postEdit');
        Route::get('order_detail/{id}', 'OrderController@getOrderDetail')->name('order');
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('producttype', 'AjaxController@getProductType');
        Route::post('setorder', 'AjaxController@setOrderStatus');
    });
});
Route::get('callback/{social}','UserController@handleProviderCallback');
Route::get('login/{social}','UserController@redirectProvider')->name('login.social');
Route::post('login','UserController@postLoginClient')->name('login');
Route::get('logout','UserController@getLogoutClient')->name('logout');
Route::post('register','UserController@registerClient')->name('register');
Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}','CartController@getAdd');
    Route::get('list','HomeController@getList');
    Route::get('get-price/{id}','CartController@getPrice');
    Route::get('delete/{id}','CartController@getDeleteCart');
});
Route::get('search','HomeController@getSearch');
