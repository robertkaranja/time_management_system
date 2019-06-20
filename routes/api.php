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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('work', 'WorksController@index');

Route::post('work/create', 'WorksController@create');


Route::get('work/{id}', 'WorksController@show');

Route::post('work', 'WorksController@store');
Route::put('work/{work}', 'WorksController@update');
Route::delete('work/{work}', 'WorksController@destroy');
//Route::apiResource('/works','WorksController');