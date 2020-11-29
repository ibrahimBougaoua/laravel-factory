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

Route::group(['prefix' => 'panel','middleware' => 'auth:admin'],function(){
       Route::get('/','App\Http\Controllers\Panel\DashbaordController@index')->name('panel.dashboard');
       Route::get('/logout','App\Http\Controllers\Panel\LoginController@logOut')->name('panel.logout');
});

Route::group(['prefix' => 'panel','middleware' => 'guest:admin'], function () {
       Route::get('/login','App\Http\Controllers\Panel\LoginController@getLogin')->name('panel.get.login');
       Route::post('/login','App\Http\Controllers\Panel\LoginController@checkLogin')->name('panel.login');
});