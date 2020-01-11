<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\master\M_customer;
use Validator;

class Customer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = M_customer::all();
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
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => '200 OK',
                'message' => $validator,
            ]);
        } else {
            M_customer::updateOrCreate(
                [
                    'kode' => $request['kode'],
                ],
                [
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'contact' => $request['contact']
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
        $data = M_customer::select('id', 'kode', 'name')->onlyTrashed()->get();
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
        M_customer::withTrashed()->where('id', $id)->restore();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_customer::findOrfail($id)->delete();
    }
}
