<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\master\M_supplier;
use Validator;

class Supplier extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = M_supplier::all();
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
            'address'=>'required',
            'contact'=>'required',
            'pic_name'=>'required',
            'pic_contact_1'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => '200 OK',
                'message' => $validator,
            ]);
        } else {
            M_supplier::updateOrCreate(
                [
                    'kode' => $request['kode'],
                ],
                [
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'contact' => $request['contact'],
                    'pic_name' => $request['pic_name'],
                    'pic_address' => $request['pic_address'],
                    'pic_contact_1' => $request['pic_contact_1'],
                    'pic_contact_2' => $request['pic_contact_2'],
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
        $data = M_supplier::select('id', 'kode', 'name')->onlyTrashed()->get();
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
        M_supplier::withTrashed()->where('id', $id)->restore();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_supplier::findOrfail($id)->delete();
    }
}
