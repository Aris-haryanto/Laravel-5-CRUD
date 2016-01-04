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
    return Redirect::to('home');
});

Route::get('create-tbluser', ['uses' => 'Primary@create_tbluser']);

Route::get('{template}', ['uses' => 'Primary@pages']);

Route::post('savedata', ['uses' => 'Primary@save', 'as' => 'route_save']);

Route::get('getdata/{id}', ['uses' => 'Primary@getdata', 'as' => 'route_edit']);

Route::post('updatedata', ['uses' => 'Primary@update', 'as' => 'route_update']);

Route::get('deletedata/{id}', ['uses' => 'Primary@delete', 'as' => 'route_delete']);
