<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'panel'], function () {
       Route::get('/','App\Http\Controllers\Panel\DashbaordController@index')->name('panel.dashboard');
       Route::post('/login','App\Http\Controllers\Panel\LoginController@checkLogin')->name('panel.login');

});