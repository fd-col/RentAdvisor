<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_annuncio')->primary();
            $table->unsignedTinyInteger('numero_camere');
            $table->unsignedSmallInteger('dimensioni_appartamento');
            $table->boolean('presenza_cucina')->default(false);
            $table->boolean('presenza_locale_ricreativo')->default(false);
            $table->enum('tipologia', ['appartamento', 'casa indipendente']);
            $table->foreign('id_annuncio')->references('id')->on('annuncio')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appartamento');
    }
}
