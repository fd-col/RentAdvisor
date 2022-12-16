<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpzioneAnnuncioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Opzione_Annuncio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username_locatario', 40);
            $table->unsignedBigInteger('id_annuncio');
            $table->dateTime('data_opzione');
            $table->unique(['username_locatario', 'id_annuncio']);
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
        Schema::dropIfExists('opzione_annuncio');
    }
}
