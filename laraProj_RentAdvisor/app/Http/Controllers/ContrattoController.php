<?php

namespace App\Http\Controllers;

use App\Http\Requests\RichiestaInserisciContratto;
use App\Models\Resources\Contratto;
use Illuminate\Http\Request;


class ContrattoController extends Controller
{
    protected $modello_contratto;

    public function __construct() {
        $this->modello_contratto = new Contratto();
    }

    public function inserisci_contratto(RichiestaInserisciContratto $richiesta) {
        $dati_validi = $richiesta->validated();
        $this->modello_contratto->inserisci_contratto($dati_validi);

        return redirect()->action('CatalogoController@dettagli_annuncio', [$dati_validi['id_annuncio']]);
    }
}
