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

    public function get_numero_richieste($filtri){

        $annunci_richiesti = Opzione_Annuncio::join('Annuncio', 'Annuncio.id','=','Opzione_Annuncio.id_annuncio');
    if(isset($filtri['data_inizio_filtro'])){
        if(!is_null($filtri['data_inizio_filtro']))
            $annunci_richiesti->where('data_opzione','<=', $filtri['data_inizio_filtro']);
    }

    if(isset($filtri['data_fine_filtro'])){
        if(!is_null($filtri['data_fine_filtro']))
            $annunci_richiesti->where('data_opzione','>=', $filtri['data_fine_filtro']);
    }

    if(isset($filtri['tipologia'])){
        if($filtri['tipologia']=='appartamento') 
            $annunci_richiesti->where('appartamento');
        if($filtri['tipologia']=='posto_letto')
            $annunci_richiesti->where('posto_letto');
    }

        $numero_richieste = count($annunci_richiesti->get());

        return $numero_richieste;
    }

}
