<?php

namespace App\Http\Controllers;

use App\Http\Requests\RichiestaEliminaAnnuncio;
use App\Http\Requests\RichiestaFiltro;
use App\Http\Requests\RichiestaInserisciAnnuncio;
use App\Http\Requests\RichiestaModificaAnnuncio;
use ErrorException;
use Illuminate\Http\Request;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Log;

class CatalogoController extends Controller
{
    protected $modello_catalogo;

    public function __construct() {
        $this->modello_catalogo = new Catalogo;
    }

    public function home() {

        $annunci = $this->modello_catalogo->get_annunci(6);
        $immagini = $this->modello_catalogo->get_immagini_annunci($annunci);
        return view('views_html/home')
            ->with('annunci', $annunci)
            ->with('immagini', $immagini);

    }

    public function catalogo_senza_filtri() {

        $annunci = $this->modello_catalogo->get_annunci();
        $immagini = $this->modello_catalogo->get_immagini_annunci($annunci);

        return view('views_html/catalogo')
            ->with('annunci', $annunci)
            ->with('immagini', $immagini);
    }

    public function dettagli_annuncio($id_annuncio) {

        $annuncio = $this->modello_catalogo->get_annuncio($id_annuncio);
        $caratteristiche = $this->modello_catalogo->get_caratteristiche_annuncio($annuncio);
        $locatore = $this->modello_catalogo->get_locatore_annuncio($annuncio);
        $immagini = $this->modello_catalogo->get_immagini_annuncio($id_annuncio);
        $utenti_che_hanno_opzionato = $this->modello_catalogo->get_utenti_opzioni_annuncio_locatore($id_annuncio);
        $opzionato = $this->modello_catalogo->controlla_opzione($id_annuncio);


        return view('views_html/dettagli_annuncio')
            ->with('annuncio', $annuncio)
            ->with('caratteristiche', $caratteristiche)
            ->with('locatore', $locatore)
            ->with('immagini', $immagini)
            ->with('utenti_che_hanno_opzionato', $utenti_che_hanno_opzionato)
            ->with('opzionato', $opzionato);

    }

	public function catalogo_con_filtri(RichiestaFiltro $richiesta){
		Log::debug($richiesta);
		$dati_validi=$richiesta->validated();
		Log::debug($dati_validi);
		$annunci=$this->modello_catalogo->get_annunci_filtrati($dati_validi);
        Log::info('Tipo annunci: '.get_class($annunci));
		$immagini = $this->modello_catalogo->get_immagini_annunci($annunci);
		return view('views_html/catalogo')
			->with('annunci', $annunci)
			->with('immagini', $immagini);

	}


    //FUNZIONI PER L'INSERIMENTO, LA MODIFICA E L'ELIMINAZIONE DEGLI ANNUNCI


    public function inserisci_annuncio(RichiestaInserisciAnnuncio $richiesta)
    {
        $dati_validi = $richiesta->validated();

        $id_annuncio_inserito = $this->modello_catalogo->inserisci_dati_annuncio($dati_validi);

        if ($richiesta->hasFile('foto_annuncio')) {

            $foto = $richiesta->file('foto_annuncio');
            $i = 0;
                foreach ($foto as $foto_singola) {
                    $nome_foto = $id_annuncio_inserito.'_'.$i.'.'.$foto_singola->getClientOriginalExtension();
                    $foto_singola->move(public_path().'/images/annunci', $nome_foto);
                    $this->modello_catalogo->inserisci_dati_immagine($nome_foto, $id_annuncio_inserito);
                    $i++;
                }
        } else {
            $this->modello_catalogo->inserisci_dati_immagine('image_not_avaiable.jpg', $id_annuncio_inserito);
        }

        return redirect()->action('ProfiloController@pagina_profilo_locatore');
    }

    public function pagina_modifica_annuncio($id_annuncio) {
        $annuncio = $this->modello_catalogo->get_annuncio($id_annuncio);

        if($annuncio->username_locatore != auth()->user()->username)
            return view('views_html/non_autorizzato');

        $caratteristiche = $this->modello_catalogo->get_caratteristiche_annuncio($annuncio);

        return view('views_html/modifica_annuncio')
            ->with('annuncio', $annuncio)
            ->with('caratteristiche', $caratteristiche);
    }

    public function modifica_annuncio(RichiestaModificaAnnuncio $richiesta) {
        $dati_validi = $richiesta->validated();
        $id_annuncio = $dati_validi['id'];

        //Controllo se l'utente loggato è effettivamente colui che ha inserito l'annuncio
        if($this->modello_catalogo->get_annuncio($id_annuncio)->username_locatore != auth()->user()->username)
            return view('views_html/non_autorizzato');

        $this->modello_catalogo->modifica_dati_annuncio($dati_validi);

        //Elimina le immagini dell'annuncio presenti prima della modifica
        $immagini = $this->modello_catalogo->get_immagini_annuncio($id_annuncio);
        foreach ($immagini as $immagine) {
            $nome_immagine = $immagine->nome_immagine;
            if ($nome_immagine != 'image_not_avaiable.jpg')
                //La funzione unlink cancella i file passati come parametro
                unlink(public_path() . '/images/annunci/' . $nome_immagine);
        }
        $this->modello_catalogo->elimina_dati_immagini($id_annuncio);

        //Inserisco le nuove immagini
        if ($richiesta->hasFile('foto_annuncio')) {
            $foto = $richiesta->file('foto_annuncio');
            $i = 0;
            foreach ($foto as $foto_singola) {
                $nome_foto = $id_annuncio.'_'.$i.'.'.$foto_singola->getClientOriginalExtension();
                $foto_singola->move(public_path().'/images/annunci', $nome_foto);
                $this->modello_catalogo->inserisci_dati_immagine($nome_foto, $id_annuncio);
                $i++;
            }
        } else {
            $this->modello_catalogo->inserisci_dati_immagine('image_not_avaiable.jpg', $id_annuncio);
        }

        return redirect()->action('CatalogoController@dettagli_annuncio', [$id_annuncio]);

    }

    public function elimina_annuncio(RichiestaEliminaAnnuncio $richiesta) {
        $dati_validi = $richiesta->validated();
        $id_annuncio = $dati_validi['id'];

        if($this->modello_catalogo->get_annuncio($id_annuncio)->username_locatore != auth()->user()->username)
            return view('views_html/non_autorizzato');

        $immagini = $this->modello_catalogo->get_immagini_annuncio($id_annuncio);
        foreach ($immagini as $immagine) {
            $nome_immagine = $immagine->nome_immagine;
            if ($nome_immagine != 'image_not_avaiable.jpg')
                //La funzione unlink cancella i file passati come parametro
                unlink(public_path() . '/images/annunci/' . $nome_immagine);
        }

        $this->modello_catalogo->elimina_annuncio($id_annuncio);

        return redirect()->action('ProfiloController@pagina_profilo_locatore');
    }

    public function toggle_disponibile_annuncio($id_annuncio) {
        if($this->modello_catalogo->get_annuncio($id_annuncio)->username_locatore != auth()->user()->username)
            return view('views_html/non_autorizzato');

        $this->modello_catalogo->toggle_disponibile_annuncio($id_annuncio);

        return redirect()->action('CatalogoController@dettagli_annuncio', [$id_annuncio]);

    }

    public function aggiungi_opzione_annuncio ($id_annuncio) {
        if(!($this->modello_catalogo->get_annuncio($id_annuncio)->disponibile))
            return view('views_html/non_autorizzato');

        try {
            $this->modello_catalogo->aggiungi_opzione_annuncio($id_annuncio);
        } catch (ErrorException $e) {
            return view('views_html/non_autorizzato');
        }

        return redirect()->action('CatalogoController@dettagli_annuncio', [$id_annuncio]);

    }

    public function catalogo_statistiche() {

    }
}
