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

    Route::prefix('barang')->group(function () {
        Route::get('index', 'master\Barang@index');
        Route::get('getSatuan', 'master\Barang@getSatuan');
        Route::post('updateOrCreate', 'master\Barang@updateOrCreate');
        Route::delete('delete/{id}', 'master\Barang@destroy');
        Route::get('getTrash', 'master\Barang@getTrash');
        Route::get('restoreData/{id}', 'master\Barang@restoreData');
    });
   
    Route::prefix('supplier')->group(function () {
        Route::get('index', 'master\Supplier@index');
        Route::post('updateOrCreate', 'master\Supplier@updateOrCreate');
        Route::delete('delete/{id}', 'master\Supplier@destroy');
        Route::get('getTrash', 'master\Supplier@getTrash');
        Route::get('restoreData/{id}', 'master\Supplier@restoreData');
    });

    Route::prefix('customer')->group(function () {
        Route::get('index', 'master\Customer@index');
        Route::post('updateOrCreate', 'master\Customer@updateOrCreate');
        Route::delete('delete/{id}', 'master\Customer@destroy');
        Route::get('getTrash', 'master\Customer@getTrash');
        Route::get('restoreData/{id}', 'master\Customer@restoreData');
    });

    Route::prefix('stok')->group(function () {
        Route::get('index', 'master\Stok@index');
    });
});

//Api group modul transaksi
Route::prefix('transaksi')->group(function () {

    Route::prefix('penjualan')->group(function () {
        Route::get('createfaktur', 'transaksi\Penjualan@CreateFaktur');
        Route::post('findproduct', 'transaksi\Penjualan@findProduct');
        Route::post('sellproduct', 'transaksi\Penjualan@sellProduct');
    });
});

Route::get('/', function () {
    return [
        'app' => config('app.name'),
        'version' => '1.0.0',
    ];
});
