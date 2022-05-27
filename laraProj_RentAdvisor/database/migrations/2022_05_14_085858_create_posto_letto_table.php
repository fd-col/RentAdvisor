<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostoLettoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Posto_Letto', function (Blueprint $table) {
            $table->unsignedBigInteger('id_annuncio')->primary();
            $table->unsignedTinyInteger('dimensioni_camera')->nullable();
            $table->unsignedSmallInteger('letti_nella_camera')->nullable();
            $table->boolean('presenza_angolo_studio')->default(false)->nullable();
            $table->enum('tipologia_posto_letto', ['singola', 'condivisa'])->nullable();
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
        Schema::dropIfExists('posto_letto');
    }
}
