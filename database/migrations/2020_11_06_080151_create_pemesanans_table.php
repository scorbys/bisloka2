<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('bkg_id');
            $table->string('kode_bkg');
            $table->date('tgl_psn');
            $table->integer('durasi');
            $table->date('tgl_balik_shr');
            $table->date('tgl_balik')->nullable();
            $table->integer('harga');
            $table->enum('status', ['dibayar', 'process']);
            $table->string('kondisi')->nullable();
            $table->integer('pegawai_id');
            $table->integer('bus_id');
            $table->integer('pelanggan_id');
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
        Schema::dropIfExists('pemesanans');
    }
}
