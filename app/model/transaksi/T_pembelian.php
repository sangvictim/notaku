<?php

namespace App\model\transaksi;

use Illuminate\Database\Eloquent\Model;

class T_pembelian extends Model
{
    protected $table = "transaksi_pembelian";

    public function pembelianDetails()
    {
        return $this->hasMany('App\model\transaksi\T_pembelian_detail');
    }
}
