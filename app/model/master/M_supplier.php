<?php

namespace App\model\master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_supplier extends Model
{
    use SoftDeletes;

    protected $table = "master_supplier";

    protected $fillable = ['kode', 'name', 'address', 'contact', 'pic_name', 'pic_address', 'pic_contact_1', 'pic_contact_2'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
