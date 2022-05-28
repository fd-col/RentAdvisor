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
            'titolo' => 'string|max:300|nullable',
			'tipologia' => 'string|required',
			'genere' => 'string|required',
			'citta' => 'nullable|max:100',
			'zona_localizzazione' => 'nullable|max:100',
			'caparra_max' => 'nullable|numeric',
			'affitto_max' => 'nullable|numeric',
			'locazione_inizio' => 'nullable|date_format:d/m/Y',
			'locazione_fine' => 'nullable|date_format:d/m/Y|after:locazione_inizio',
			'bagni' => 'nullable|integer',
			'n_posti_letto_totali' => 'nullable|integer',
			'piano' => 'nullable|integer',
			'fumatori' => 'nullable|string|max:6',
			'parcheggio' => 'nullable|string|max:6' ,
			'wi_fi' => 'nullable|string|max:6',
			'ascensore' => 'nullable|string|max:6',
			'numero_camere' => 'nullable|integer',
			'appartamento_min' => 'nullable|integer',
			'appartamento_max' => 'nullable|integer',
			'tipologia_appartamento' => 'required',
			'locale_ricreativo' => 'nullable|string|max:6',
			'letti_camera' => 'nullable|integer',
			'dim_camera_min' => 'nullable|integer',
			'dim_camera_max'=> 'nullable|integer',
			'tipologia_posto_letto' => 'required',
			'angolo_studio' => 'nullable|string|max:6'
        ];
    }

}
