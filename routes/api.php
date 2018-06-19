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

Route::get('/projects', 'ProjectController@index');
Route::get('/projects/main', 'ProjectController@indexMain');
Route::middleware('auth:api')->post('/projects', 'ProjectController@store');
Route::get('/project/{id}', 'ProjectController@show');
Route::middleware('auth:api')->post('/user/image', 'UserController@saveImage');
Route::middleware('auth:api')->post('/project/image', 'ProjectController@saveImage');

Route::middleware('auth:api')->post('/profile', 'UserController@update');
