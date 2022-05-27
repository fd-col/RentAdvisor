<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RichiestaModificaDati extends FormRequest {

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
            'username' => 'required',
            'nome' => 'required|max:191',
            'cognome' => 'required|max:191',
            'genere' => 'required|in:M,F,ND',
            'data_nascita' => 'required|date_format:Y-m-g',
            'email' => 'required',
            'telefono' => 'nullable|string'
        ];
    }

}
