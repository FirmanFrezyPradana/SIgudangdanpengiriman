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
        Schema::create('tb_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->unsignedBigInteger('id_gudang');
            $table->unsignedBigInteger('id_kategori');
            $table->string('satuan');
            $table->integer('stoke_awal');
            $table->integer('stoke_masuk');
            $table->integer('stoke_keluar');
            $table->integer('stoke_akhir');
            $table->timestamps();
            // relasi
            $table->foreign('id_gudang')->references('id')->on('tb_gudangs');
            $table->foreign('id_kategori')->references('id')->on('tb_kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_barangs');
    }
};
