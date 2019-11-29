<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterPiutang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_piutang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice');
            $table->integer('id_customer');
            $table->integer('total');
            $table->dateTime('top');
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
        Schema::dropIfExists('master_piutang');
    }
}
