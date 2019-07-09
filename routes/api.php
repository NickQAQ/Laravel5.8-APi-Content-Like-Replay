<?php

Route::group(['namespace'=>'User'],function(){

    Route::post('user/register','RegisterController@register')->name('user.write.register');
    Route::post('user/login','LoginController@login')->name('user.read.login');
    Route::post('user/list','UserController@list')->name('user.read.list');

});

Route::apiResource('/topic','Topic\TopiceController');

