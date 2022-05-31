<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Opzione_Annuncio;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Log;

class Statistiche extends Model
{ 

    public function get_numero_annunci($filtri){

        $annunci_totali = Annuncio::select();
        
        if(isset($filtri['data_inizio_filtro'])){
            if(!is_null($filtri['data_inizio_filtro']))
                $annunci_totali->where('data_inserimento','>=', (new DateTime($filtri['data_inizio_filtro'])));
        }
        //Log::debug(strval($annunci_richiesti->get()));
        if(isset($filtri['data_fine_filtro'])){
            if(!is_null($filtri['data_fine_filtro']))
                $annunci_totali->where('data_inserimento','<=', (new DateTime($filtri['data_fine_filtro'])));
        }
        
        if(isset($filtri['tipologia'])){
            if($filtri['tipologia']=='appartamento') 
                $annunci_totali->where('tipologia', $filtri['tipologia']);
            if($filtri['tipologia']=='posto_letto')
                $annunci_totali->where('tipologia', $filtri['tipologia']);
        }
        
        $output= count($annunci_totali->get());
        return $output;
    }

    public function get_numero_richieste($filtri){

        $annunci_richiesti = Opzione_Annuncio::join('Annuncio', 'Annuncio.id','=','Opzione_Annuncio.id_annuncio');
        Log::debug(strval($annunci_richiesti->get()));
    if(isset($filtri['data_inizio_filtro'])){
        if(!is_null($filtri['data_inizio_filtro']))
            $annunci_richiesti->where('data_opzione','>=', (new DateTime($filtri['data_inizio_filtro'])));
    }
    Log::debug(strval($annunci_richiesti->get()));
    if(isset($filtri['data_fine_filtro'])){
        if(!is_null($filtri['data_fine_filtro']))
            $annunci_richiesti->where('data_opzione','<=', (new DateTime($filtri['data_fine_filtro'])));
    }
    
    if(isset($filtri['tipologia'])){
        if($filtri['tipologia']=='appartamento') 
            $annunci_richiesti->where('tipologia', $filtri['tipologia']);
        if($filtri['tipologia']=='posto_letto')
            $annunci_richiesti->where('tipologia', $filtri['tipologia']);
    }
        $numero_richieste = count($annunci_richiesti->get());
        

        return $numero_richieste;
    }

}
