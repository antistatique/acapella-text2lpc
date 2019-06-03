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

Route::get('/', 'HomeController@index');
Route::get('loginOAuth', 'LoginController@loginOAuth')->middleware('guest');
Route::get('logout', 'LoginController@logout')->middleware('auth');
Route::get('login', function () {
    return view('login');
})->middleware('guest');
Route::post('login', 'LoginController@login')->middleware('guest');
Route::get('add_library', 'LibraryController@create')->middleware('auth');
