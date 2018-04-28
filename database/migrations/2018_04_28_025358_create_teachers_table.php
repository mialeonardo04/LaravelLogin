<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->string('NIP',12)->primary();
            $table->string('Nama');
            $table->string('Tempat_lahir');
            $table->date('Tanggal_lahir');
            $table->string('Alamat');
            $table->string('Nama_ayah');
            $table->string('Nama_ibu');
            $table->string('Pendidikan');
            $table->string('Jurusan');
            $table->string('Telepon');
            $table->string('email');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
