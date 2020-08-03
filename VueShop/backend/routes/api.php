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

Route::post('/addItem',[
   'uses' => 'ItemController@postItem'
]);

Route::get('/getItems',[
    'uses' => 'ItemController@getItems'
]);

Route::get('/getItem/{id}',[
    'uses' => 'ItemController@getItem'
]);

Route::delete('/deleteItem/{id}',[
    'uses' => 'ItemController@deleteItem'
]);

Route::put('/editItem/{id}',[
    'uses' => 'ItemController@editItem'
]);
