<?php

namespace App\Http\Controllers;

use App\Http\Requests\RichiestaModificaDati;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Catalogo;
use App\Models\Resources\Messaggio;

class ProfiloController extends Controller
{
    protected $modello_user;
    protected $modello_catalogo;
    protected $modello_messaggio;

    public function __construct(){
        $this->modello_user = new User;
        $this->modello_catalogo = new Catalogo;
        $this->modello_messaggio = new Messaggio;
    }

    public function pagina_profilo_locatario(){

        $user = $this->modello_user::where('username', auth()->user()->username)->get()->first();
        $annunci_opzionati = $this->modello_catalogo->get_annunci_opzionati_locatario(auth()->user()->username);
        $immagini = $this->modello_catalogo->get_immagini_annunci($annunci_opzionati);

        return view('views_html/visualizza_profilo_locatario')
            ->with('user', $user)
            ->with('annunci_opzionati', $annunci_opzionati)
            ->with('immagini', $immagini);
    }

    public function pagina_profilo_locatore(){

        $user = $this->modello_user::where('username', auth()->user()->username)->get()->first(); //auth() altro modo per richiamare la facade AUTH
        $annunci = $this->modello_catalogo->get_annunci_locatore(auth()->user()->username);
        $immagini = $this->modello_catalogo->get_immagini_annunci($annunci);
        $messaggi = $this->modello_messaggio->get_utenti_ultimi_messaggi_locatore(auth()->user()->username);
        return view('views_html/area_personale_locatore')
            ->with('user', $user)
            ->with('annunci', $annunci)
            ->with('immagini', $immagini)
            ->with('messaggi', $messaggi);

    }

    public function modifica_dati_locatore(RichiestaModificaDati $richiesta){//permette di modificare i dati del locatore
        $dati_validi = $richiesta->validated();                              //validazione tramite request
        $this->modello_user->modifica_dati_utente($dati_validi);

        return redirect()->action('ProfiloController@pagina_profilo_locatore');
    }

    public function modifica_dati_locatario(RichiestaModificaDati $richiesta){
        $dati_validi = $richiesta->validated();
        $this->modello_user->modifica_dati_utente($dati_validi);

        return redirect()->action('ProfiloController@pagina_profilo_locatario');
    }
}
