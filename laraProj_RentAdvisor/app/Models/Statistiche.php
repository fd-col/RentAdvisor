<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Opzione_Annuncio;
use App\Models\Catalogo;

class Statistiche extends Model
{
    public function get_numero_annunci(){
        $annunci_totali = Annuncio::count();
        return $annunci_totali;
    }

    /*public function get_numero_richieste($filtri){
        $annunci_richiesti = Opzione_Annuncio::select();
        if(!isnull($filtri['locazione_inizio']))
        $annunci_richiesti->where('data_opzione','<', $filtri['locazione_inizio']);
        if(!isnull($filtri['locazione_fine']))
        $annunci_richiesti->where('data_opzione','>', $filtri['locazione_fine']);
        $numero_richieste = count($annunci_richiesti);
        
        return $numero_richieste;
    }*/

}
