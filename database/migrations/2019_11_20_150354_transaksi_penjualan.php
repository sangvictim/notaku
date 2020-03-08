<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice');
            $table->integer('id_customer')->nullable();
            $table->dateTime('tgl_penjualan');
            $table->string('type_disc')->nullable();
            $table->integer('disc')->nullable();
            $table->string('kode_promo')->nullable();
            $table->integer('subtotal');
            $table->integer('total');
            $table->integer('total_bayar');
            $table->integer('kembalian');
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
        Schema::dropIfExists('transaksi_penjualan');
    }
}
