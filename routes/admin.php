<?php

Route::group(['prefix' =>'authenticate'], function() {
    Route::get('/login',['as' => 'admin.login','uses' => 'AuthAdmin\LoginController@getLogin']);
    Route::post('/login',['as' => 'admin.postlogin','uses' =>  'AuthAdmin\LoginController@postLogin']);
    Route::get('/register','AuthAdmin\AuthController@getRegister');
    Route::post('/register','AuthAdmin\AuthController@postRegister');
    Route::get('/logout-admin',['as' => 'logout.admins','uses' => 'AuthAdmin\AuthController@logoutAdmin']);
});