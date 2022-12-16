<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Contratto extends Model
{
    protected $table = 'Contratto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Realazione One-To-One con Annuncio
    public function prodCat(){
        return $this->hasOne(Annuncio::class, 'id', 'id_annuncio');
    }

    public function inserisci_contratto($dati_validi) {
        $this::insert(['username_locatore' => $dati_validi['username_locatore'], 'username_locatario' => $dati_validi['username_locatario'], 'id_annuncio' => $dati_validi['id_annuncio'],
            'data_inizio' => $dati_validi['data_inizio'], 'data_fine' => $dati_validi['data_fine']]);
    }
}
