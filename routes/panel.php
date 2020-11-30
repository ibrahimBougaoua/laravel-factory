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

       /* point of sale routing */
       Route::group(['prefix' => 'pointofsale'],function(){
                    Route::get('/','App\Http\Controllers\Panel\PointOfSaleController@index')->name('pointofsale.index');
                    Route::get('/edit/{id}','App\Http\Controllers\Panel\PointOfSaleController@edit')->name('pointofsale.edit');
                    Route::post('/update/{id}','App\Http\Controllers\Panel\PointOfSaleController@update')->name('pointofsale.update');
                    Route::get('/create','App\Http\Controllers\Panel\PointOfSaleController@create')->name('pointofsale.create');
                    Route::post('/store','App\Http\Controllers\Panel\PointOfSaleController@store')->name('pointofsale.store');
                    Route::get('/show/{id}','App\Http\Controllers\Panel\PointOfSaleController@show')->name('pointofsale.show');
                    Route::get('/delete/{id}','App\Http\Controllers\Panel\PointOfSaleController@destroy')->name('pointofsale.delete');
       });

       /* sales man routing */
       Route::group(['prefix' => 'salesman'],function(){
                    Route::get('/','App\Http\Controllers\Panel\SalesManController@index')->name('salesman.index');
                    Route::get('/edit/{employee_id}/{point_sale_id}/{date}','App\Http\Controllers\Panel\SalesManController@edit')->name('salesman.edit');
                    Route::post('/update/{employee_id}/{point_sale_id}/{date}','App\Http\Controllers\Panel\SalesManController@update')->name('salesman.update');
                    Route::get('/create','App\Http\Controllers\Panel\SalesManController@create')->name('salesman.create');
                    Route::post('/store','App\Http\Controllers\Panel\SalesManController@store')->name('salesman.store');
                    Route::get('/show/{id}','App\Http\Controllers\Panel\SalesManController@show')->name('salesman.show');
                    Route::get('/delete/{employee_id}/{point_sale_id}/{date}','App\Http\Controllers\Panel\SalesManController@destroy')->name('salesman.delete');
       });
       
       /* categories routing */
       Route::group(['prefix' => 'category'],function(){
                    Route::get('/','App\Http\Controllers\Panel\CategoryController@index')->name('category.index');
                    Route::get('/edit/{id}','App\Http\Controllers\Panel\CategoryController@edit')->name('category.edit');
                    Route::post('/update/{id}','App\Http\Controllers\Panel\CategoryController@update')->name('category.update');
                    Route::get('/create','App\Http\Controllers\Panel\CategoryController@create')->name('category.create');
                    Route::post('/store','App\Http\Controllers\Panel\CategoryController@store')->name('category.store');
                    Route::get('/show/{id}','App\Http\Controllers\Panel\CategoryController@show')->name('category.show');
                    Route::get('/delete/{id}','App\Http\Controllers\Panel\CategoryController@destroy')->name('category.delete');
       });

       Route::get('/logout','App\Http\Controllers\Panel\LoginController@logOut')->name('panel.logout');
});

Route::group(['prefix' => 'panel','middleware' => 'guest:admin'], function () {
       Route::get('/login','App\Http\Controllers\Panel\LoginController@getLogin')->name('panel.get.login');
       Route::post('/login','App\Http\Controllers\Panel\LoginController@checkLogin')->name('panel.login');
});