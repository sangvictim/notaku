<?php

Route::get('/', function () {
    return view('login');
});

Route::get('/page', 'SinglePageController@index');
