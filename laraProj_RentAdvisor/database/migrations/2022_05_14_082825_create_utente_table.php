<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utente', function (Blueprint $table) {
            $table->string('username',40)->primary();
            $table->string('nome', 40);
            $table->string('cognome', 40);
            $table->enum('genere', ['M', 'F', 'ND']);
            $table->date('data_nascita');
            $table->string('email', 50);
            $table->string('telefono', 13)->nullable();
            $table->string('psw', 50);
            $table->enum('tipologia', ['locatore', 'locatario', 'admin']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utente');
    }
}
