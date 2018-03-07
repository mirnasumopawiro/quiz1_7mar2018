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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	Route::get('getCategory', 'CategoryController@getCategory');
	Route::post('insertCategory', 'CategoryController@insertCategory');
	Route::delete('deleteCategory', 'CategoryController@deleteCategory');
	Route::put('updateCategory', 'CategoryController@updateCategory');
	Route::get('showByCategory/{id}', 'CategoryController@showByCategory');

    Route::get('getItem', 'StockController@getItem');
	Route::post('insertItem', 'StockController@insertItem');
	Route::delete('deleteItem', 'StockController@deleteItem');
	Route::put('updateItem', 'StockController@updateItem');
	Route::get('showByItem/{id}', 'StockController@showByItem');
