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
use Illuminate\Http\Request;

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
Route::post('/task', function (Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
		'user_id' => 'required|exists:users,id'
	]);

	if ($validator->fails()) {
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	$task = new Task;
	$task->name = $request->name;
	$task->user_id = $request->user_id;
	$task->save();

	return redirect('/');
});


/**
 * Delete Task
 */
Route::delete('/task/{id}', function ($id) {
	Task::findOrFail($id)->delete();

	return redirect('/');
});

/**
 * Add New User
 */
Route::post('/user', function (Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
		'email' => 'required|email',
	]);

	if ($validator->fails()) {
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	$user = new User;
	$user->name = $request->name;
	$user->email = $request->email;
	$user->save();

	return redirect('/');
});

/**
 * Delete User
 */
Route::delete('/user/{id}', function ($id) {
	User::findOrFail($id)->delete();

	return redirect('/');
});