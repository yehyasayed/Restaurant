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
Route::get('/admin', 'App\Http\Controllers\back\AdminController@showAdmin');
Route::POST('/admin/add-chef', 'App\Http\Controllers\back\AdminController@addChef');
Route::POST('/admin/delet-chef', 'App\Http\Controllers\back\AdminController@deletChef');
Route::POST('/admin/add-menu', 'App\Http\Controllers\back\AdminController@addMenu');
Route::POST('/admin/delet-menu', 'App\Http\Controllers\back\AdminController@deletMenu');




