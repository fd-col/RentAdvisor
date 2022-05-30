<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources\Statistiche;

class FaqController extends Controller
{
    protected $modello_statistiche;

    public function __construct() {
        $this->modello_statistiche = new Statistiche;
    }

    public function pagina_statistiche() {
        $statistiche = $this->modello_faq->get_statistiche();

        return view('views_html/statistiche')
            ->with('statistiche', $statistiche);
    }

 
}
