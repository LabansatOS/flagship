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

Auth::routes();

$returnApp = function () {
  return view('app');
};

Route::get('/create/project', 'ProjectController@create');

Route::get('/', $returnApp);
Route::get('/projects', $returnApp);
Route::get('/project/{id}', $returnApp);

Route::get('/profile', $returnApp);
Route::get('/profile/{field}', $returnApp);


