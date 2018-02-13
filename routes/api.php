<?php

use Illuminate\Http\Request;
Use App\Associations;
Use App\Adherents;
Use App\Pistes;
Use App\Temps;


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
Route::get('/associations', function (Request $request) {
    return Associations::all();
});
Route::post('/associations','AssociationsController@store');
Route::put('/associations/{idAsso}','AssociationsController@update');
Route::delete('/associations/{idAsso}','AssociationsController@destroy');