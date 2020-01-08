<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerMasterStok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_master_stok AFTER INSERT ON `master_barang` FOR EACH ROW
            BEGIN
                INSERT INTO master_stok (`kode_barang`, `stok_barang`) 
                VALUES (NEW.kode, 0);
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
        DB::unprepared('DROP TRIGGER `trigger_master_stok`');
    }
}
