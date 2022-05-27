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
        Schema::create('Appartamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_annuncio')->primary();
            $table->unsignedTinyInteger('numero_camere')->nullable();
            $table->unsignedSmallInteger('dimensioni_appartamento')->nullable();
            $table->boolean('presenza_cucina')->default(false)->nullable();
            $table->boolean('presenza_locale_ricreativo')->default(false)->nullable();
            $table->enum('tipologia_appartamento', ['appartamento', 'casa indipendente'])->nullable();
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
        Schema::dropIfExists('appartamento');
    }
}
