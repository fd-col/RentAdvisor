<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmagineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Immagine', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_annuncio');
            $table->string('nome_immagine');
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
        Schema::dropIfExists('immagine');
    }
}
