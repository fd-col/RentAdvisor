<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Posto_Letto;
use App\Models\Resources\Appartamento;
use App\User;


class Catalogo extends Model
{
    public function get_annunci($numero_annunci=null) {
        if (is_null($numero_annunci))
            $annunci = Annuncio::select()->where('disponibile', true)->orderBy('data_inserimento')->get();
        else
            $annunci = Annuncio::select()->where('disponibile', true)->orderBy('data_inserimento')->get()->take($numero_annunci);
        return $annunci;
    }

    public function get_annuncio($id_annuncio) {
        $annuncio = Annuncio::where('id', $id_annuncio)->get()->first();
        return $annuncio;
    }

    public function get_caratteristiche_annuncio ($annuncio) {
        if ($annuncio->tipologia == 'appartamento') {
            $caratteristiche = Appartamento::where('id_annuncio', $annuncio->id)->get()->first();
            return $caratteristiche;
        }

        if ($annuncio->tipologia == 'posto_letto') {
            $caratteristiche = Posto_Letto::where('id_annuncio', $annuncio->id)->get()->first();
            return $caratteristiche;
        }
    }

    public function get_locatore_annuncio($annuncio) {

        $locatore = User::where('username', $annuncio->username_locatore)->get()->first();
        return $locatore;
    }

    public function get_utente($username) {
        $user = User::where('username', $username)->get()->first();
        return $user;
    }
}
