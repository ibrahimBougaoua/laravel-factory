<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/','middleware' => 'auth:customer'],function(){
       Route::get('/dashbaord','App\Http\Controllers\Ui\DashboardController@index')->name('ui.dashbaord');
       Route::get('/signup','App\Http\Controllers\Ui\CustomerController@signup')->name('ui.signup');
	 Route::post('/create','App\Http\Controllers\Ui\CustomerController@store')->name('ui.customer.store');
       Route::get('/orders','App\Http\Controllers\Ui\OrderController@index')->name('ui.orders');
       Route::get('/product/{id}','App\Http\Controllers\Ui\ProductController@show')->name('ui.product.show');
       Route::get('/profile','App\Http\Controllers\Ui\CustomerController@profile')->name('ui.profile');
       Route::post('/update','App\Http\Controllers\Ui\CustomerController@update')->name('ui.customer.update');
	 Route::post('/changePhoto','App\Http\Controllers\Ui\CustomerController@changePhoto')->name('ui.customer.changePhoto');
      Route::group(['prefix' => 'cart'],function(){
      	 Route::get('/addToCart/{product}','App\Http\Controllers\Ui\PaymentController@addToCart')->name('product.addToCart');
             Route::get('/','App\Http\Controllers\Ui\PaymentController@dispalyCart')->name('product.viewCart');
             Route::get('/checkout/{amount}','App\Http\Controllers\Ui\PaymentController@checkOut')->name('product.checkout');
             Route::post('/charge/','App\Http\Controllers\Ui\PaymentController@charge')->name('product.charge');
             Route::get('/product/{id}','App\Http\Controllers\Ui\ProductController@destroy')->name('product.remove');
             Route::post('/update/{id}','App\Http\Controllers\Ui\ProductController@update')->name('product.change');
      });

      Route::get('/logout','App\Http\Controllers\Ui\LoginController@logOut')->name('ui.logout');
});

Route::group(['prefix' => '/','middleware' => 'guest:customer'], function () {
       Route::get('/login','App\Http\Controllers\Ui\LoginController@getLogin')->name('ui.get.login');
       Route::post('/login','App\Http\Controllers\Ui\LoginController@checkLogin')->name('ui.login');
});