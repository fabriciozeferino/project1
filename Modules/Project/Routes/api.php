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


Route::group(['middleware' => 'auth:api'], function () {

    Route::get('projects', 'ProjectController@index');
    Route::get('projects/{project}', 'ProjectController@show');
    Route::post('projects', 'ProjectController@store');
    Route::put('projects/{project}', 'ProjectController@update');
    Route::delete('projects/{project}', 'ProjectController@delete');

});

//Route::post('register', 'Auth\RegisterController@register');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');

// Route::middleware('auth:api')
//     ->get('/user', function (Request $request) {
//         return $request->user();
//     });


// Route::fallback(function () {
//     return response()->json([
//         'data' => 'Resource not found'
//     ], 404);
// })->name('api.fallback.404');