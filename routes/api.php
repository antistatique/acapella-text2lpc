<?php

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

Route::get('/encode', 'LPCController@getLPCKeys');

Route::group(['api', 'auth'], function () {
    Route::post('/library/store', 'LibraryController@store');
    Route::post('/upload_image', 'LibraryController@uploadImage');
    Route::post('/library/create', 'LibraryController@saveImages');
    Route::delete('/library/delete/{id}', 'LibraryController@destroy');
});
