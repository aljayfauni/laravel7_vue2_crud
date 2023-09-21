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
    return view('tasks');
});

Route::get('/tasks/list', function () {
    return view('tasklist');
});
//Route::resource('tasks', 'TaskController')->except(['create', 'edit']); // Exclude unnecessary routes
Route::get('/tasks/edit/{id}', function ($id) {
    return view('taskEdit', ['taskId' => $id]);
});

// Additional routes for specific actions
Route::delete('tasks/{id}', 'TaskController@destroy'); // Delete task

Route::get('/tasks/search', 'TaskController@search'); // Add this line
Route::delete('/tasks/{id}', 'TaskController@destroy');
