<?php

namespace App\model\master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_customer extends Model
{
    use SoftDeletes;

    protected $table = "master_customer";

    protected $fillable = ['kode', 'name', 'address', 'contact'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
