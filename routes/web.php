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

Route::any('/word','WordController@toWord')->name('write.word');
Route::any('/openWord','WordController@openWord');
Route::any('/testword','WordController@test');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
