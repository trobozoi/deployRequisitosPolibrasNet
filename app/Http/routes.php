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

Route::get('/', function () {
    return view('welcome');
});

Route::get('exemplo', 'ApplicationController@exemplo');
//Route::get('application', 'ApplicationController@index');
//Route::get('application/create', 'ApplicationController@create');
Route::resource('application', 'ApplicationController');
Route::resource('version', 'VersionController');
Route::resource('file', 'FileController');
Route::resource('client', 'ClientController');
