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
        Schema::create('jadwal_wawancaras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lamaran');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_tes');
            $table->string('jam', 20);
            $table->string('lokasi', 20);
       
            $table->foreign('id_lamaran')->references('id')->on('lamarans')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('jadwal_wawancaras');
    }
};
