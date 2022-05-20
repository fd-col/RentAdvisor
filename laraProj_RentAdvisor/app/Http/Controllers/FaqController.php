<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources\Faq;

class FaqController extends Controller
{
    protected $modello_faq;

    public function __construct() {
        $this->modello_faq = new Faq;
    }

    public function pagina_faq() {
        $faq = $this->modello_faq->get_faq();

        return view('views_html/faq')
            ->with('faq', $faq);
    }
}
