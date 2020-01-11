<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\master\M_stok;
use App\model\M_konversi;

class Stok extends Controller
{
    public function index()
    {
        $data = [];
        $data = M_stok::select('master_stok.*', 'master_barang.name')
                        ->join('master_barang', 'master_stok.kode', 'master_barang.kode')
                        ->get();
        foreach ($data as $key => $value) {
            $konversi = M_konversi::where('kode', $value->kode)->get();
            $data['satuan'] = $konversi; 
        }
        return response()->json([
            'status' => '200 OK',
            'result' => $data,
        ]);
    }

}
