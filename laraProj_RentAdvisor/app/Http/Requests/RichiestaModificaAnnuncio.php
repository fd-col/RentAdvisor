<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class RichiestaModificaAnnuncio extends FormRequest {

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
            'id' => 'required',
            'titolo' => 'required|string|max:200',
            'descrizione' => 'required|string|max:1000',
            'tipologia' => 'required|in:appartamento,posto_letto',
            'provincia' => 'required|string|max:2',
            'citta' => 'required|string|max:50',
            'cap' => 'required|string|max:6',
            'zona_di_localizzazione' => 'nullable|string|max:50',
            'indirizzo' => 'required|string|max:100',
            'numero_civico' => 'required|string|max:6',
            'piano' => 'required|numeric|min:0|max:99',
            'numero_posti_letto_totali_alloggio' => 'required|numeric|min:1|max:15',
            'numero_bagni' => 'required|numeric|min:1|max:100',
            'fumatori' => 'required|boolean',
            'parcheggio' => 'required|boolean',
            'wi_fi' => 'required|boolean',
            'ascensore' => 'required|boolean',
            'tipologia_appartamento' => 'nullable|in:appartamento,casa_indipendente',
            'dimensioni_appartamento' => 'nullable|numeric|min:1|max:1000',
            'numero_camere' => 'nullable|min:1|max:100',
            'presenza_cucina' => 'nullable|boolean',
            'presenza_locale_ricreativo' => 'nullable|boolean',
            'tipologia_posto_letto' => 'nullable|in:singola,condivisa',
            'dimensioni_camera' => 'nullable|numeric|min:1|max:1000',
            'letti_nella_camera' => 'nullable|numeric|min:1|max:100',
            'presenza_angolo_studio' => 'nullable|boolean',
            'canone_affitto' => 'required|numeric|min:1|max:9999',
            'caparra' => 'required|numeric|min:1|max:9999',
            'durata_minima_locazione' => 'required|numeric|min:1|max:500',
            'genere_preferito' => 'required|in:M,F,ND',
            'eta_preferita_min' => 'nullable|numeric|min:18|max:100',
            'eta_preferita_max' => 'nullable|numeric|min:18|max:100|gt:eta_preferita_min',
            'periodo_disponibilita_inizio' => 'required|date_format:Y-m-d|after:yesterday',
            'periodo_disponibilita_fine' => 'nullable|date_format:Y-m-d|after:periodo_disponibilita_inizio',
            'foto_annuncio[]' => 'nullable|file|mimes:jpeg,jpg,png|max:1024',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
