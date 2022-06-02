<?php

namespace App\Http\Controllers;

use App\Http\Requests\RichiestaInserisciContratto;
use App\Models\Resources\Contratto;
use App\Models\Catalogo;
use App\User;
use Illuminate\Http\Request;


class ContrattoController extends Controller
{
    protected $modello_contratto;
    protected $modello_catalogo;
    protected $modello_user;

    public function __construct() {
        $this->modello_contratto = new Contratto();
        $this->modello_catalogo = new Catalogo();
        $this->modello_user = new User();
    }

    public function inserisci_contratto(RichiestaInserisciContratto $richiesta) {
        $dati_validi = $richiesta->validated();
        $this->modello_contratto->inserisci_contratto($dati_validi);

        $annuncio = $this->modello_catalogo->get_annuncio($dati_validi['id_annuncio']);
        $locatore = $this->modello_user->get_utente($dati_validi['username_locatore']);
        $locatario = $this->modello_user->get_utente($dati_validi['username_locatario']);
        $data_inizio = $dati_validi['data_inizio'];
        $data_fine = $dati_validi['data_fine'];


        return view('views_html/contratto')
            ->with('annuncio', $annuncio)
            ->with('locatore', $locatore)
            ->with('locatario', $locatario)
            ->with('data_inizio', $data_inizio)
            ->with('data_fine', $data_fine);
    }
}
