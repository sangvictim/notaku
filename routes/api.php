<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', 'AuthController@register')->middleware('auth.jwt');
Route::post('login', 'AuthController@login');
Route::get('login', 'AuthController@login');

// Api gorup modul master
Route::prefix('master')->group(function () {

    // Api modul master
    Route::prefix('barang')->group(function () {
        // Api function dari modul master barang
        Route::get('get-data', 'master\Barang@getData');
    });
});

Route::get('/', function () {
    return [
        'app' => config('app.name'),
        'version' => '1.0.0',
    ];
});
