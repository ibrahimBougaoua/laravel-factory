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

       /* employee routing */
       Route::group(['prefix' => 'employee'],function(){
                    Route::get('/','App\Http\Controllers\Panel\EmployeeController@index')->name('employee.index');
                    Route::get('/edit/{id}','App\Http\Controllers\Panel\EmployeeController@edit')->name('employee.edit');
                    Route::post('/update/{id}','App\Http\Controllers\Panel\EmployeeController@update')->name('employee.update');
                    Route::get('/create','App\Http\Controllers\Panel\EmployeeController@create')->name('employee.create');
                    Route::post('/store','App\Http\Controllers\Panel\EmployeeController@store')->name('employee.store');
                    Route::get('/show/{id}','App\Http\Controllers\Panel\EmployeeController@show')->name('employee.show');
                    Route::get('/delete/{id}','App\Http\Controllers\Panel\EmployeeController@destroy')->name('employee.delete');
       });

       /* factory routing */
       Route::group(['prefix' => 'factory'],function(){
                    Route::get('/','App\Http\Controllers\Panel\FactoryController@index')->name('factory.index');
                    Route::get('/edit/{id}','App\Http\Controllers\Panel\FactoryController@edit')->name('factory.edit');
                    Route::post('/update/{id}','App\Http\Controllers\Panel\FactoryController@update')->name('factory.update');
                    Route::get('/create','App\Http\Controllers\Panel\FactoryController@create')->name('factory.create');
                    Route::post('/store','App\Http\Controllers\Panel\FactoryController@store')->name('factory.store');
                    Route::get('/show/{id}','App\Http\Controllers\Panel\FactoryController@show')->name('factory.show');
                    Route::get('/delete/{id}','App\Http\Controllers\Panel\FactoryController@destroy')->name('factory.delete');
       });
       
       Route::get('/logout','App\Http\Controllers\Panel\LoginController@logOut')->name('panel.logout');
});

Route::group(['prefix' => 'panel','middleware' => 'guest:admin'], function () {
       Route::get('/login','App\Http\Controllers\Panel\LoginController@getLogin')->name('panel.get.login');
       Route::post('/login','App\Http\Controllers\Panel\LoginController@checkLogin')->name('panel.login');
});