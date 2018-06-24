<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->string('NIS',12)->primary();
            $table->string('Tahun',12);
            $table->string('SPP');
            $table->string('Uang_kegiatan');
            $table->string('Uang_buku');
            $table->string('Katering');
            $table->string('Komite');
            $table->string('Seragam');
            $table->string('Others');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
