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

Route::get('/','App\Http\Controllers\Ui\HomeController@index')->name('ui.product');
Route::get('/product/{id}','App\Http\Controllers\Ui\ProductController@show')->name('ui.product.show');
Route::get('/factory/{id}','App\Http\Controllers\Ui\FactoryController@show')->name('ui.factory.show');
Route::get('/category/{id}','App\Http\Controllers\Ui\CategoryController@show')->name('ui.category.show');
