<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'FAQ';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function get_faq() {
        return $this::select()->get();
    }

    public function get_faq_singola($id_faq) {
        return $this::where('id', $id_faq)->get()->first();
    }

    public function aggiungi_faq($dati_validi) {
        $this::insert(['domanda' => $dati_validi['domanda'], 'risposta' => $dati_validi['risposta']]);
    }

    public function modifica_faq($dati_validi) {
        $this::where('id', $dati_validi['id'])
            ->limit(1)
            ->update(['domanda' => $dati_validi['domanda'], 'risposta' => $dati_validi['risposta']]);
    }

    public function elimina_faq($dati_validi) {
        $this::where('id', $dati_validi['id'])->limit(1)->delete();
    }
}
