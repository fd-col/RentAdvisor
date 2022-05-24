<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;

class CatalogoController extends Controller
{
    protected $modello_catalogo;

    public function __construct() {
        $this->modello_catalogo = new Catalogo;
    }

    public function home($username = null) {

        $annunci = $this->modello_catalogo->get_annunci(6);
        return view('views_html/home')
            ->with('annunci', $annunci);

    }

    public function catalogo_senza_filtri() {

        $annunci = $this->modello_catalogo->get_annunci();

        return view('views_html/catalogo')
            ->with('annunci', $annunci);
    }

    public function dettagli_annuncio($id_annuncio) {

        $annuncio = $this->modello_catalogo->get_annuncio($id_annuncio);
        $caratteristiche = $this->modello_catalogo->get_caratteristiche_annuncio($annuncio);
        $locatore = $this->modello_catalogo->get_locatore_annuncio($annuncio);

        return view('views_html/dettagli_annuncio')
            ->with('annuncio', $annuncio)
            ->with('caratteristiche', $caratteristiche)
            ->with('locatore', $locatore);

    }
	public function catalogo_con_filtri(){
		
	}
}
