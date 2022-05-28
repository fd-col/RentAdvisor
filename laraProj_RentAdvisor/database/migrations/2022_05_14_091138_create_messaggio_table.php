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
        Schema::create('Messaggio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username_locatore', 40);
            $table->string('username_locatario', 40);
            $table->dateTime('data_invio');
            $table->string('testo', 500);
            $table->enum('mittente', ['locatore', 'locatario']);
            $table->foreign('username_locatore')->references('username')->on('users')->onUpdate('cascade');
            $table->foreign('username_locatario')->references('username')->on('users')->onUpdate('cascade');
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
