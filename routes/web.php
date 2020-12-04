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

Route::get('/', function () {
    return view('ui.home');
});

Route::get('/dispalyCart','App\Http\Controllers\Panel\ProductController@dispalyCart')->name('product.dispalyCart');
Route::get('/checkout/{amount}','App\Http\Controllers\Panel\ProductController@checkOut')->name('product.checkout');
Route::post('/charge/{amount}','App\Http\Controllers\Panel\ProductController@charge')->name('product.charge');