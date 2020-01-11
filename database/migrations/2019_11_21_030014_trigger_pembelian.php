<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_pembelian AFTER INSERT ON `transaksi_pembelian_detail` FOR EACH ROW
            BEGIN
                UPDATE master_stok SET `stok_barang` = `stok_barang` + new.qty WHERE master_stok.kode = new.kode_barang;
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
        DB::unprepared('DROP TRIGGER `trigger_pembelian`');
    }
}
