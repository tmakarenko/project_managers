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


Route::prefix('/managers')->group(function () {
	Route::put('/{mid}','ManagerController@update');
	Route::post('/','ManagerController@store');
});

Route::prefix('/projects')->group(function () {
	Route::post('/','ProjectController@store');
	Route::put('/{pid}','ProjectController@update');
});