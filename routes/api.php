<?php

Route::group(['namespace'=>'User'],function(){

    Route::post('user/register','RegisterController@register')->name('user.write.register');
    Route::post('user/login','LoginController@login')->name('user.read.login');
    Route::post('user/list','UserController@list')->name('user.read.list');

});

Route::any('/test','User\RegisterController@test')->name('test');
Route::apiResource('/topic','Topic\TopicController');


Route::group(['namespace'=>'Discussions'],function (){

    Route::get('/discussions/show','DiscussionsController@show');
    Route::post('/discussions/store','DiscussionsController@store');
    Route::delete('/discussions/destroy','DiscussionsController@destroy');

});

