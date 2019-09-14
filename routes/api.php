<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('addfavorite', 'CategoryController@addToFavorite');
Route::post('removefavorite', 'CategoryController@removeFromFavorite');
Route::get('getuser/{id}', 'UserController@getuser');
Route::post('changestate', 'UserController@changestate');
Route::get('getcategory/{id}','CategoryController@getcat');
