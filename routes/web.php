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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pistes/{idPiste?}', 'PistesController@index')->name('pistes');
Route::post('/store', 'TempsController@store')->name('store');
Route::post('/create', 'PistesController@store')->name('create');
Route::get('/account', 'AdherentsController@index')->name('adherents');
Route::get('/associations', 'AssociationsController@index')->name('associations');
