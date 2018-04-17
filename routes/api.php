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

// ASOCIATIONS
Route::get('/associations', function (Request $request) {
    return Associations::all();
});
Route::post('/associations','AssociationsController@store');
Route::put('/associations/{idAsso}','AssociationsController@update');
Route::delete('/associations/{idAsso}','AssociationsController@destroy');

// ADHERENTS
Route::get('/adherents', function (Request $request) {
    return Adherents::all();
});
Route::post('/adherents','AdherentsController@store');
Route::put('/adherents/{idAdh}','AdherentsController@update');
Route::delete('/adherents/{idAdh}','AdherentsController@destroy');

Route::post('/login','AdherentsController@login');

// PISTES
Route::get('/pistes', function (Request $request) {
    return Pistes::all();
});
Route::post('/pistes','PistesController@store');
Route::put('/pistes/{idPiste}','PistesController@update');
Route::delete('/pistes/{idPiste}','PistesController@destroy');

// TEMPS
Route::get('/temps', function (Request $request) {
    return Temps::all();
});
Route::post('/temps','TempsController@store');
Route::put('/temps/{id}','TempsController@update');
Route::delete('/temps/{id}','TempsController@destroy');