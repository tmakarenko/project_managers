<?php

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

Route::get('/', function () {
    return redirect('/managers');
});




Route::prefix('/projects')->group(function () {
	Route::get('/','ProjectController@index');
	Route::post('/','ProjectController@store');

    Route::get('/create', function () {
    	return view('projects.create');
    });

    Route::get('/{pid}/managers/{mid}','ProjectController@getManager');
    Route::get('{pid}/managers','ProjectController@showManagers');
});



Route::prefix('/managers')->group(function () {
    
    Route::get('/','ManagerController@index');
    Route::post('/','ManagerController@store');
    Route::get('/create', function () {
    	return view('managers.create');
    });
    Route::get('/{mid}/projects/{pid}','ManagerController@getProject');
    Route::get('{mid}/projects','ManagerController@showProjects');
});