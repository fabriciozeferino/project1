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
    return asset('/');
});



// Route::get('/projects', 'ProjectController@index');

// Route::post('/projects', 'ProjectController@create');

// Auth::routes();



// Route::middleware(['auth'])->group(function () {

//     Route::get('projects/{project_id}/task/{task_id}', 'TaskController@show');

//     Route::post('projects/{project_id}/task/', 'TaskController@store');

//     Route::delete('projects/{project_id}/task/{task_id}', 'TaskController@destroy');

//     Route::put('projects/{project_id}/task/{task_id}/edit', 'TaskController@update');

//     //Route::get('projects/{project}/task/{task}', 'TaskController@show');
// });



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');





