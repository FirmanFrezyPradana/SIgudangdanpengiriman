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
        Schema::create('tb_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_outlet');
            $table->unsignedBigInteger('id_barang');
            $table->string('kode_pemesanan');
            $table->integer('jumlah_pesanan');
            $table->string('satuan');
            $table->integer('total_harga');
            $table->integer('total_pemesanan');
            $table->date('tanggal_pemesanan');
            $table->string('status_pemesanan')->nullable();
            $table->timestamps();
            $table->foreign('id_outlet')->references('id')->on('tb_outlets');
            $table->foreign('id_barang')->references('id')->on('tb_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pemesanans');
    }
};
