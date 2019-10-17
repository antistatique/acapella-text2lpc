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

Route::get('/print', 'LPCController@printTags');
Route::get('/', 'HomeController@index');
Route::get('loginOAuth', 'LoginController@loginOAuth')->middleware('guest');
Route::get('logout', 'LoginController@logout')->middleware('auth');
Route::get('login', function () {
    return view('login');
})->middleware('guest');
Route::post('login', 'LoginController@login')->middleware('guest');
Route::get('library/create', 'LibraryController@create')->middleware('auth');
Route::get('private/files/{keyId}/{fileName}', 'LibraryController@getPrivateImage')->middleware('auth');
Route::get('library/delete/{id}', 'LibraryController@destroy')->middleware('auth');
Route::get('library/edit/{id}', 'LibraryController@edit')->middleware('auth');