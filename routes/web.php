<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/register', 'App\Http\Controllers\UserController@store');
Route::get('/user/register', 'App\Http\Controllers\UserController@registerForm');
Route::get('/user/login', 'App\Http\Controllers\UserController@loginForm');


Route::get('/home', 'App\Http\Controllers\HomeController@index');


Route::get('/goods/detail/{id}', 'App\Http\Controllers\GoodsController@getById');

//Dummy Admin
Route::post('/goods', 'App\Http\Controllers\GoodsController@store');
Route::get('/goods', 'App\Http\Controllers\GoodsController@formStore');
