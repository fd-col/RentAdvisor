<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RichiestaInserisciAnnuncio extends FormRequest {

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
            'numero_bagni' => 'required|numeric|min:1|max:10',
            'fumatori' => 'required|boolean',
            'parcheggio' => 'required|boolean',
            'wi_fi' => 'required|boolean',
            'acensore' => 'required|boolean',
            'tipologia_appartamento' => 'nullable|in:appartamento,casa_indipendente',
            'dimensioni_appartamento' => 'nullable|numeric|min:1|max:1000',
            'numero_camere' => 'nullable|min:1|max:20',
            'presenza_cucina' => 'nullable|boolean',
            'presenza_locale_ricreativo' => 'nullable|boolean',
            'tipologia_posto_letto' => 'nullable|in:singola,condivisa',
            'dimensioni_camera' => 'nullable|numeric|min:1|max:100',
            'letti_nella_camera' => 'nullable|numeric|min:1|max:10',
            'presenza_angolo_studio' => 'nullable|boolean',
            'canone_affitto' => 'required|numeric|min:1|max:10000',
            'caparra' => 'required|numeric|min:1|max:10000',
            'durata_minima_locazione' => 'required|numeric|min:1',
            'genere_preferito' => 'required|in:M,F,ND',
            'eta_preferita_min' => 'nullable|numeric|min:18|max:100',
            'eta_preferita_max' => 'nullable|numeric|min:18|max:100',
            'periodo_disponibilita_inizio' => 'required|date',
            'periodo_disponibilita_fine' => 'nullable|date',
            'foto_annuncio' => 'nullable|file|mimes:jpeg,jpg,png|max:5120',
        ];
    }

}
