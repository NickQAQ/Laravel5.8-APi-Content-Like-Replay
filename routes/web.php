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

Route::any('/upload','UploadController@upload')->name('upload.qiniu');


Route::group(['namespace'=>'User'],function (){
    Route::any('/user/register','RegisterController@register')->name('write.user.register');
});

Route::any('/test','User\RegisterController@test');
Route::any('/note/index','NoteController@index');
