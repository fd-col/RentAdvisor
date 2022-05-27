<?php

namespace App\Http\Controllers;


use App\Http\Requests\RichiestaFiltro;
use App\Models\Resources\Immagine;
use App\Http\Requests\RichiestaInserisciAnnuncio;
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

        return view('views_html/dettagli_annuncio')
            ->with('annuncio', $annuncio)
            ->with('caratteristiche', $caratteristiche)
            ->with('locatore', $locatore)
            ->with('immagini', $immagini);

    }

	public function catalogo_con_filtri(RichiestaFiltro $richiesta){
		$dati_validi=$richiesta->validated();
		$annunci=$this->modello_catalogo->get_annunci_filtrati($dati_validi);
		$immagini = $this->modello_catalogo->get_immagini_annunci($annunci);
		return view('views_html/catalogo')
			->with('annunci', $annunci)
			->with('immagini', $immagini)
			->paginate(9);

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
            $i = 0;
            foreach ($richiesta->file('foto_annuncio') as $foto) {
                Log::info("Foto: ".$foto->getClientOriginalName());
                $nome_foto = $id_annuncio_inserito.'_'.$i.'.'.$foto->getClientOriginalExtension();
                $foto->move(public_path().'/images', $nome_foto);
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
