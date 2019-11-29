<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerReturPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_retur_penjualan AFTER INSERT ON `retur_penjualan_detail` FOR EACH ROW
            BEGIN
                UPDATE master_stok SET `stok_barang` = `stok_barang` + new.qty WHERE `master_stok`.`kode_barang` = new.kode_barang;
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
        DB::unprepared('DROP TRIGGER `trigger_retur_penjualan`');
    }
}
