<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessaggioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggio', function (Blueprint $table) {
            $table->string('username_locatore', 40);
            $table->string('username_locatario', 40);
            $table->dateTime('data_invio');
            $table->string('testo', 500);
            $table->enum('mittente', ['locatore', 'locatario']);
            $table->primary(['username_locatore', 'username_locatario', 'data_invio'], 'chiave_primaria_tabella_messaggio');
            $table->foreign('username_locatore')->references('username')->on('utente')->onUpdate('cascade');
            $table->foreign('username_locatario')->references('username')->on('utente')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggio');
    }
}
