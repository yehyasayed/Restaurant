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

Route::POST('/make-order', 'App\Http\Controllers\front\FrontController@makeOrder');
Route::get('/home', 'App\Http\Controllers\front\FrontController@showHome');
Route::get('/menu', 'App\Http\Controllers\front\FrontController@getMenu');
Route::get('/menu/meals', 'App\Http\Controllers\front\FrontController@getMenuMeals');
Route::get('/menu/desserts', 'App\Http\Controllers\front\FrontController@getMenuDesserts');
Route::get('/menu/drinks', 'App\Http\Controllers\front\FrontController@getMenuDrinks');
Route::get('/order', 'App\Http\Controllers\front\FrontController@order');


