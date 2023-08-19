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
Route::post('/user/login', 'App\Http\Controllers\UserController@login');
Route::get('/user/register', 'App\Http\Controllers\UserController@registerForm');
Route::get('/user/login', 'App\Http\Controllers\UserController@loginForm')->name('login');
Route::get('/user/logout', 'App\Http\Controllers\UserController@logout');

Route::get('/home', 'App\Http\Controllers\HomeController@index');


//Protected Route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/goods/detail/{id}', 'App\Http\Controllers\GoodsController@getById');
    Route::post('/bid', 'App\Http\Controllers\BidController@store');
    Route::get('/user/profile', 'App\Http\Controllers\UserController@profile');
    Route::get('/user/history', 'App\Http\Controllers\UserController@history');
});

//Dummy Admin
Route::post('/goods', 'App\Http\Controllers\GoodsController@store');
Route::get('/goods', 'App\Http\Controllers\GoodsController@formStore');
