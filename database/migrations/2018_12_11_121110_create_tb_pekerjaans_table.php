<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pekerjaans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_perusahaan');
            $table->string('nama_perusahaan',250);
            $table->string('pekerjaan',250);
            $table->integer('gaji_min');
            $table->integer('gaji_max');
            $table->text('detail pekerjaan');
            $table->text('syarat_pekerjaan');
            $table->text('syarat_cv');
            $table->enum('status_validasi',['valid','non_valid']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_kategori')->references('id')->on('tb_kategoris');
            $table->foreign('id_perusahaan')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pekerjaans');
    }
}
