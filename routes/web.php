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

 Route::post('/login', 'UserController@login')->name('login');
  Route::get('/logout', 'UserController@logout')->name('log_out');
  Route::get('/register', 'UserController@create');
 Route::post('/register', 'UserController@store');
  Route::get('/me', 'UserController@edit');
Route::patch('/user/{user}', 'UserController@update');

Route::resource('exercises', 'ExerciseController')->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('/exercises/all', 'ExerciseController@indexAll');
    Route::get('/exercises/{exercise_id}/sessions', 'SessionController@indexByExercise');

    Route::get('/sessions/date', 'SessionController@indexInDate');
    Route::get('/sessions/date/index', 'SessionController@indexSessionsByDay');
Route::resource('sessions', 'SessionController')->only(['update', 'store', 'destroy']);

Route::get('/test', 'UserController@test')->name('test');
Route::get('/', 'ExerciseController@index')->name('home');
