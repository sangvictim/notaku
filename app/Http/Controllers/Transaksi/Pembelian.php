<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\model\transaksi\T_pembelian;
use App\model\transaksi\T_pembelian_detail;
use App\model\master\M_Barang;
use Illuminate\Http\Request;

class Pembelian extends Controller
{
    public function CreateFaktur()
    {
        $date = date ( 'YmdHms' );
        $faktur = env('FAKTUR_PEMBELIAN') . '-' . $date;
        return $faktur;
    }

    public function findProduct(Request $request)
    {
        $product = M_Barang::select("id", "kode", "name", "harga_retail as harga")->where("kode", $request['kode'])->firstOrFail();
        return ResponseOK("200", $product);
    }

    public function sellProduct(Request $request)
    {
        $no_faktur = $this->CreateFaktur();
        $sell = new T_pembelian;
        $sell->no_invoice = $no_faktur;
        $sell->tgl_pembelian = date('Y-m-d H:m:s');
        $sell->id_supplier= $request['id_supplier'];
        $sell->subtotal = $request['subtotal'];
        $sell->total = $request['total'];
        $sell->total_bayar = $request['total_bayar'];
        $sell->kembalian = $request['kembalian'];
        $sell->save();

        foreach ($request['productDetail'] as $item) {
            $detail = new T_pembelian_detail;
            $detail->no_invoice = $no_faktur;
            $detail->kode_barang = $item['code'];
            $detail->nama_barang = $item['name'];
            $detail->harga_pembelian = $item['harga'];
            $detail->qty = $item['qty'];
            $detail->save();
        }

        $data = array(
            'message' => "data berhasil di jual"
        );
        return ResponseOK("200", $data);
    }
}
