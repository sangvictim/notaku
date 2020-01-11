<?php

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'SinglePageController@index');
    Route::get('/home', 'SinglePageController@index');
    Route::get('/page', 'SinglePageController@index');
});