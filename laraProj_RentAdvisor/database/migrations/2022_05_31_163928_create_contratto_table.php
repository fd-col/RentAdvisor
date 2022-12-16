<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContrattoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contratto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username_locatore', 40);
            $table->string('username_locatario', 40);
            $table->unsignedBigInteger('id_annuncio');
            $table->date('data_inizio');
            $table->date('data_fine');
            $table->foreign('username_locatore')->references('username')->on('users')->onUpdate('cascade');
            $table->foreign('username_locatario')->references('username')->on('users')->onUpdate('cascade');
            $table->foreign('id_annuncio')->references('id')->on('Annuncio')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratto');
    }
}
