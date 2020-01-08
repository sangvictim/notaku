<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\master\M_barang;

class Barang extends Controller
{
    public function getData(Request $request)
    {
         $data = M_barang::select('id', 'kode', 'name', 'harga_beli', 'harga_grosir', 'harga_retail')->get();
        return response()->json([
            'status' => '200 OK',
            'result' => $data,
        ]);
    }
}
