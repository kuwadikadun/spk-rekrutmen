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
        Schema::create('keterampilans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lamaran');
            $table->unsignedBigInteger('id_jadwalKeterampilan');    
            $table->unsignedBigInteger('id_user');
            $table->integer('psikotes');
            $table->integer('ketangkasan');
            $table->decimal('nilaiasli_psikotes', 8,2);
            $table->decimal('nilaiasli_ketangkasan', 8,2);
            $table->decimal('nilaibobot_psikotes', 8,2);
            $table->decimal('nilaibobot_ketangkasan', 8,2);
            $table->decimal('cf', 8,2);
            $table->decimal('sf', 8,2);
            $table->decimal('total', 8,2);
       
            $table->foreign('id_lamaran')->references('id')->on('lamarans')->onDelete('cascade');
            $table->foreign('id_jadwalKeterampilan')->references('id')->on('jadwal_keterampilans')->onDelete('cascade');
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
        Schema::dropIfExists('keterampilans');
    }
};
