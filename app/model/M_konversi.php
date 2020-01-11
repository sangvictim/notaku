<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class M_konversi extends Model
{
    protected $table = "master_konversi";

    protected $fillable = ['kode', 'qty', 'satuan'];
}
