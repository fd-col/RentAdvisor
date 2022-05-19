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

    public function catalogo_senza_filtri() {

        $annunci = $this->modello_catalogo->get_annunci();

        return view('views_html/catalog')
            ->with('annunci', $annunci);
    }
}
