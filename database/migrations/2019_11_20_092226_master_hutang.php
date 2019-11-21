<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterHutang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_hutang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice');
            $table->integer('id_supplier');
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
        Schema::dropIfExists('master_hutang');
    }
}
