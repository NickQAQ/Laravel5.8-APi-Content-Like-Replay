<?php

Route::group(['namespace'=>'User'],function(){

    Route::post('user/register','RegisterController@register');

});
