<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\master\M_barang;
use App\model\M_konversi;
use Validator;
use DB;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = M_barang::all();
        // $satuan = M_barang::select('master_barang.kode','master_satuan.name')
        //                 ->join('master_konversi', 'master_barang.kode', '=', 'master_konversi.kdoe')
        //                 ->join('master_satuan', 'master_konversi.satuan', '=', 'master_satuan.id')
        //                 ->get();
        return response()->json([
            'status' => '200 OK',
            'result' => $data
        ]);
    }

    public function getSatuan()
    {
        $data = DB::select('SELECT * FROM master_satuan');
        return response()->json([
            'status' => '200 OK',
            'result' => $data,
        ]);
    }

    /**
     * updateOrCreate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode'=>'required',
            'name'=>'required',
            'harga_beli'=>'required',
            'harga_grosir'=>'required',
            'harga_retail'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => '200 OK',
                'message' => $validator,
            ]);
        } else {
            M_barang::updateOrCreate(
                [
                    'kode' => $request['kode'],
                ],
                [
                    'name' => $request['name'],
                    'harga_beli' => $request['harga_beli'],
                    'harga_grosir' => $request['harga_grosir'],
                    'harga_retail' => $request['harga_retail'],
                ]);
            M_konversi::where('kode', $request['kode'])->delete();
            foreach ($request['satuan'] as $val) {
                M_konversi::insert([
                    'kode'=>$request['kode'],
                    'qty'=>$val['qty'],
                    'satuan'=>$val['satuan']
                ]);
            };
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTrash()
    {
        $data = M_barang::select('id', 'kode', 'name')->onlyTrashed()->get();
        return response()->json([
            'status' => '200 OK',
            'result' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restoreData($id)
    {
        M_barang::withTrashed()->where('id', $id)->restore();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_barang::findOrfail($id)->delete();
    }
}
