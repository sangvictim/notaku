<?php

namespace App\model\transaksi;

use Illuminate\Database\Eloquent\Model;

class T_penjualan extends Model
{
    protected $table = "transaksi_penjualan";

    public function penjualanDetails()
    {
        return $this->hasMany('App\model\transaksi\T_penjualan_detail');
    }
}
