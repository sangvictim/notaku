<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\master\M_barang;
use Validator;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = M_barang::select('id', 'kode', 'name', 'harga_beli', 'harga_grosir', 'harga_retail')->get();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
