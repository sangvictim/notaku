<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerReturPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_retur_pembelian AFTER INSERT ON `retur_pembelian_detail` FOR EACH ROW
            BEGIN
                UPDATE master_stok SET `stok_barang` = `stok_barang` + new.qty WHERE `master_stok`.`kode` = new.kode_barang;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `trigger_retur_pembelian`');
    }
}
