<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReturPembelianDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_pembelian_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('harga_pembelian');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur_pembelian_detail');
    }
}
