<?php

use Illuminate\Support\Facades\Auth;
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

// The post request for uploading the image
Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile');

Route::resource('/todos', 'TodoController'); // Or the code commented below (are equal).
//Route::get('/todos', 'TodoController@index')->name('todos.index');
//Route::get('/todos/create', 'TodoController@create')->name('todos.create');
//Route::post('/todos/create', 'TodoController@store')->name('todos.store');
//Route::get('/todos/{id}/edit', 'TodoController@edit')->name('todos.edit');
//Route::put('/todos/{id}/update', 'TodoController@update')->name('todos.update');
//Route::delete('/todos/{id}/destroy', 'TodoController@destroy')->name('todos.destroy');

Route::put('/todos/{id}/complete', 'TodoController@complete')->name('todos.complete');
Route::put('/todos/{id}/incomplete', 'TodoController@incomplete')->name('todos.incomplete');

