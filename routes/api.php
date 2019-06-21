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

//Add the work details
Route::get('create', 'WorksController@create');

Route::post('work_create',
    [
        'as' => 'store.work',
        'uses' => 'WorksController@store'
    ]);

//Edit details routes

Route::get('work/{id}/edit',
  [
        'as' => 'edit',
        'uses' => 'WorksController@edit'
  ]);


Route::put('work/{work}', [
        
        'as' => 'work.update',
        'uses' => 'WorksController@update'
  ]);


  //Delete records

  

//Route::get('work/{work}/edit', 'WorksController@edit');

Route::get('work/{id}', 'WorksController@show');

//Route::post('work', 'WorksController@store');

//Route::delete('work/{id}/delete', 'WorksController@destroy');
//Route::apiResource('work','WorksController');


 Route::get('work-delete/{id}',
     [
         'as' => 'work_delete',
         'uses' => 'WorksController@deleteTask'
     ]);