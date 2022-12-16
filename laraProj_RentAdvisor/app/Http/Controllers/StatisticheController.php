<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistiche;
use App\Http\Requests\RichiestaStatistiche;
use Illuminate\Support\Facades\Log;

class StatisticheController extends Controller
{
    protected $modello_statistiche;

    public function __construct() {
        $this->modello_statistiche = new Statistiche;
    }

    public function pagina_statistiche(RichiestaStatistiche $richiesta) {
        $dati_validi=$richiesta->validated();
        
        $numero_annunci = $this->modello_statistiche->get_numero_annunci($dati_validi);
        $numero_richieste = $this->modello_statistiche->get_numero_richieste($dati_validi);
        $numero_contratti = $this->modello_statistiche->get_numero_contratti($dati_validi);

        return view('views_html/statistiche')
            ->with('numero_annunci', $numero_annunci)
            ->with('numero_richieste', $numero_richieste)
            ->with('numero_contratti', $numero_contratti);
    }

 
}
