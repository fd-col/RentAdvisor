<?php

namespace App\Http\Controllers;

use App\Http\Requests\RichiestaEliminaFaq;
use App\Http\Requests\RichiestaInserisciFaq;
use App\Http\Requests\RichiestaModificaFaq;
use Illuminate\Http\Request;
use App\Models\Resources\Faq;

class FaqController extends Controller
{
    protected $modello_faq;

    public function __construct() {
        $this->modello_faq = new Faq;
    }

    public function pagina_faq() {
        $faq = $this->modello_faq->get_faq(); //restituisce le faq

        return view('views_html/faq')
            ->with('faq', $faq);
    }

    public function pagina_modifica_faq($id_faq) {
        $faq_da_modificare = $this->modello_faq->get_faq_singola($id_faq);

        return view('views_html/modifica_faq')
            ->with('faq_da_modificare', $faq_da_modificare);
    }

    public function modifica_faq(RichiestaModificaFaq $richiesta) {

        $dati_validi = $richiesta->validated();
        $this->modello_faq->modifica_faq($dati_validi);

        return redirect()->action('FaqController@pagina_faq');
    }


    public function aggiungi_faq(RichiestaInserisciFaq $richiesta) {
        $dati_validi = $richiesta->validated();
        $this->modello_faq->aggiungi_faq($dati_validi);

        return redirect()->action('FaqController@pagina_faq');
    }

    public function pagina_elimina_faq($id_faq) {
        $faq_da_eliminare = $this->modello_faq->get_faq_singola($id_faq);

        return view('views_html/elimina_faq')
            ->with('faq_da_eliminare', $faq_da_eliminare);
    }

    public function elimina_faq(RichiestaEliminaFaq $richiesta) {
        $dati_validi = $richiesta->validated();
        $this->modello_faq->elimina_faq($dati_validi);

        return redirect()->action('FaqController@pagina_faq');
    }
}
