<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('ID_Bayar');
            $table->string('NIS',12);
            $table->string('Tahun',12);
            $table->date('Tanggal_bayar');
            $table->string('SPP_byr');
            $table->string('Uang_kegiatan_byr');
            $table->string('Uang_buku_byr');
            $table->string('Katering_byr');
            $table->string('Komite_byr');
            $table->string('Seragam_byr');
            $table->string('Others_byr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
