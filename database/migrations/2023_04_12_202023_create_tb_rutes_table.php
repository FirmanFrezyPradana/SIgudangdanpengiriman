<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengiriman');
            $table->date('date');
            $table->string('track_rute');
            $table->timestamps();
            $table->foreign('id_pengiriman')->references('id')->on('tb_pengiriman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_rutes');
    }
};
