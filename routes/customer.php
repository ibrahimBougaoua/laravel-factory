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
      Route::group(['prefix' => 'cart'],function(){
             Route::get('/','App\Http\Controllers\Ui\ProductController@dispalyCart')->name('product.dispalyCart');
             Route::get('/checkout/{amount}','App\Http\Controllers\Ui\ProductController@checkOut')->name('product.checkout');
             Route::post('/charge/','App\Http\Controllers\Ui\ProductController@charge')->name('product.charge');
      });
});