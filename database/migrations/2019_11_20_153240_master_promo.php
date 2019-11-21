<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterPromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_promo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_promo');
            $table->string('type_disc');
            $table->integer('disc');
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->integer('minimum_pembelian');
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
        Schema::dropIfExists('master_promo');
    }
}
