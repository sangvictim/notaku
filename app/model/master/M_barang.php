<?php

namespace App\model\master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_barang extends Model
{
    use SoftDeletes;

    protected $table = "master_barang";

    protected $fillable = ['kode', 'name', 'harga_beli', 'harga_grosir', 'harga_retail'];

    protected $dates = ['deleted_at'];
}
