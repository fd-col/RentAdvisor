<?php

namespace App\Http\Controllers;

use App\Http\Requests\RichiestaFiltro;
use App\Http\Requests\RichiestaInserisciAnnuncio;
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

        try {
            $annuncio = $this->modello_catalogo->get_annuncio($id_annuncio);
            $caratteristiche = $this->modello_catalogo->get_caratteristiche_annuncio($annuncio);
            $locatore = $this->modello_catalogo->get_locatore_annuncio($annuncio);
            $immagini = $this->modello_catalogo->get_immagini_annuncio($id_annuncio);

            return view('views_html/dettagli_annuncio')
                ->with('annuncio', $annuncio)
                ->with('caratteristiche', $caratteristiche)
                ->with('locatore', $locatore)
                ->with('immagini', $immagini);
        } catch (ErrorException $e) {
            return view('views_html/404');
        }

    }

	public function catalogo_con_filtri(RichiestaFiltro $richiesta){
		Log::debug($richiesta);
		$dati_validi=$richiesta->validated();
		Log::debug($dati_validi);
		$annunci=$this->modello_catalogo->get_annunci_filtrati($dati_validi);
		$immagini = $this->modello_catalogo->get_immagini_annunci($annunci);
		return view('views_html/catalogo')
			->with('annunci', $annunci)
			->with('immagini', $immagini);

	}

    public function inserisci_annuncio(RichiestaInserisciAnnuncio $richiesta)
    {

        $dati_validi = $richiesta->validated();

        $id_annuncio_inserito = $this->modello_catalogo->inserisci_dati_annuncio($dati_validi);

        if ($dati_validi['tipologia'] == 'appartamento')
            $this->modello_catalogo->inserisci_dati_appartamento($dati_validi, $id_annuncio_inserito);

        if ($dati_validi['tipologia'] == 'posto_letto')
            $this->modello_catalogo->inserisci_dati_posto_letto($dati_validi, $id_annuncio_inserito);

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

    public function catalogo_statistiche() {

    }
}
