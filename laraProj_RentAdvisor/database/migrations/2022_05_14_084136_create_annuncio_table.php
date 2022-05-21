<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnuncioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Annuncio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username_locatore', 40);
            $table->string('titolo', 200);
            $table->string('descrizione', 1000);
            $table->enum('tipologia', ['appartamento', 'posto_letto']);
            $table->date('data_inserimento');
            $table->boolean('disponibile')->default(true);
            $table->char('provincia', 2);
            $table->string('citta', 50);
            $table->char('cap', 5);
            $table->string('zona_di_localizzazione', 50)->nullable()->default(null);
            $table->string('indirizzo', 100);
            $table->string('numero_civico', 6);
            $table->unsignedTinyInteger('piano');
            $table->unsignedTinyInteger('numero_posti_letto_totali_alloggio');
            $table->unsignedTinyInteger('numero_bagni');
            $table->boolean('fumatori')->default(false);
            $table->boolean('parcheggio')->default(false);
            $table->boolean('wi_fi')->default(false);
            $table->boolean('ascensore')->default(false);
            $table->double('canone_affitto',6,2);
            $table->double('caparra',6,2);
            $table->unsignedTinyInteger('durata_minima_locazione');
            $table->enum('genere_preferito', ['M','F', 'ND']);
            $table->unsignedTinyInteger('eta_preferita_min')->nullable();
            $table->unsignedTinyInteger('eta_preferita_max')->nullable();
            $table->date('periodo_disponibilita_inizio');
            $table->date('periodo_disponibilita_fine')->nullable();
            $table->foreign('username_locatore')->references('username')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annuncio');
    }
}
