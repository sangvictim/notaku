<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterHutangDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_hutang_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice');
            $table->string('note');
            $table->integer('total');
            $table->string('via');
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
        Schema::dropIfExists('master_hutang_detail');
    }
}
