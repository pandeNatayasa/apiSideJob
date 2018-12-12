<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pekerjaan');
            $table->unsignedInteger('id_perusahaan');
            $table->unsignedInteger('id_user');
            $table->string('nama_cv',250);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_pekerjaan')->references('id')->on('tb_pekerjaans');
            $table->foreign('id_perusahaan')->references('id')->on('users');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cvs');
    }
}
