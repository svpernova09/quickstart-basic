<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Task;
use App\User;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    return view('tasks', [
    	'tasks' => Task::orderBy('created_at', 'asc')->get(),
    	'users' => User::orderBy('created_at', 'asc')->get(),
    ]);
});


/**
 * Add New Task
 */
Route::post('/task', ['as' => 'task.create', 'uses' => 'TaskController@create']);

/**
 * Delete Task
 */
Route::delete('/task/{id}', ['as' => 'task.destroy', 'uses' => 'TaskController@destroy']);

/**
 * Add New User
 */
Route::post('/user', ['as' => 'user.create', 'uses' => 'UserController@create']);

/**
 * Delete User
 */
Route::delete('/user/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);