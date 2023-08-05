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
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lamaran');
            $table->unsignedBigInteger('id_user');
            $table->integer('kelengkapan');
            $table->integer('kerapihan');
            $table->integer('nilai_ijazah');
            $table->decimal('nilaiasli_kelengkapan', 8,2);
            $table->decimal('nilaiasli_kerapihan', 8,2);
            $table->decimal('nilaiasli_ijazah', 8,2);
            $table->decimal('nilaibobot_kelengkapan', 8,2);
            $table->decimal('nilaibobot_kerapihan', 8,2);
            $table->decimal('nilaibobot_ijazah', 8,2);
            $table->decimal('cf', 8,2);
            $table->decimal('sf', 8,2);
            $table->decimal('total', 8,2);


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
        Schema::dropIfExists('administrasis');
    }
};
