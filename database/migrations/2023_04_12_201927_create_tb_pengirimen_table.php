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
        Schema::create('tb_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('pemesanan_kode')->nullable();
            $table->unsignedBigInteger('id_kendaraan')->nullable();
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->unsignedBigInteger('id_sopir')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id')->on('tb_pemesanans');
            $table->foreign('id_kendaraan')->references('id')->on('tb_kendaraans');
            $table->foreign('id_jadwal')->references('id')->on('tb_jadwals');
            $table->foreign('id_sopir')->references('id')->on('tb_sopirs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengiriman');
    }
};
