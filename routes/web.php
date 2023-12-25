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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectController@index');
Route::get('/project/{id}', 'ProjectController@show');

Route::get('/create-project', 'ProjectController@create');
Route::post('/create-project', 'ProjectController@store');

Route::get('/project/{id}/edit', 'ProjectController@edit');
Route::put('/project/{id}/edit', 'ProjectController@update');

Route::get('/project/{id}/delete', 'ProjectController@destroy');
