<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\model\transaksi\T_penjualan;
use App\model\transaksi\T_penjualan_detail;
use App\model\master\M_Barang;
use Illuminate\Http\Request;

class Penjualan extends Controller
{
    public function CreateFaktur()
    {
        $date = date ( 'YmdHms' );
        $faktur = env('FAKTUR_PENJUALAN') . '-' . $date;
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
        $sell = new T_penjualan;
        $sell->no_invoice = $no_faktur;
        $sell->tgl_penjualan = date('Y-m-d H:m:s');
        $sell->id_customer = $request['id_customer'];
        $sell->subtotal = $request['subtotal'];
        $sell->total = $request['total'];
        $sell->total_bayar = $request['total_bayar'];
        $sell->kembalian = $request['kembalian'];
        $sell->save();

        foreach ($request['productDetail'] as $item) {
            $detail = new T_penjualan_detail;
            $detail->no_invoice = $no_faktur;
            $detail->kode_barang = $item['code'];
            $detail->nama_barang = $item['name'];
            $detail->harga_penjualan = $item['harga'];
            $detail->qty = $item['qty'];
            $detail->save();
        }

        $data = array(
            'message' => "data berhasil di jual"
        );
        return ResponseOK("200", $data);
    }
}
