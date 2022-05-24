<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RichiestaFiltro extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'titolo' => 'alphanumeric|max:300',
			'tipologia' => 'alphanumeric|required',
			'genere' => 'alphanumeric|required',
			'citta' => 'max:100'
			'zona' => 'max:100',
			'caparra_max' => 'numeric',
			'affitto_max' => 'numeric',
			'locazione_inizio' => 'date',
			'locazione_fine' => 'date',
			'bagni' => 'integer',
			'n_posti_letto_totali' => 'integer',
			'piano' => 'integer',
			'fumatori' => 'alphanumeric|max:6',
			'parcheggio' => 'alphanumeric|max:6' ,
			'wi_fi' => 'alphanumeric|max:6',
			'ascensore' => 'alphanumeric|max:6',
			'numero_camere' => 'integer',
			'appartamento_min' => 'integer', 
			'appartamento_max' => 'integer',
			'tipologia_appartamento' => 'required',
			'locale_ricreativo' => 'alphanumeric|max:6',
			'letti_camera' => 'integer',
			'dim_camera_min' => 'integer',
			'dim_camera_max'=> 'integer',
			'tipologia_posto_letto' => 'required',
			'angolo_studio' => 'alphanumeric|max:6'
        ];
    }

}
