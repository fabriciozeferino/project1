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

// Route::middleware('auth:api')->get('/project', function (Request $request) {
//     return $request->user();
// });


Route::group([

    'middleware' => 'auth:api'

], function () {

    Route::get('project', 'ProjectController@index');
    Route::get('project/{project}', 'ProjectController@show');
    Route::post('project', 'ProjectController@store');
    Route::put('project/{project}', 'ProjectController@update');
    Route::delete('project/{project}', 'ProjectController@delete');

    Route::get('project/{project}/task', 'TaskController@index');
    Route::get('project/{project}/task/{task}', 'TaskController@show');
    Route::post('project/{project}/task', 'TaskController@store');
    Route::put('project/{project}/task/{task}', 'TaskController@update');
    Route::delete('project/{project}/task/{task}', 'TaskController@delete');
});


// Route::fallback(function () {
//     return response()->json([
//         'data' => 'Resource not found'
//     ], 404);
// })->name('api.fallback.404');