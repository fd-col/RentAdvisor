<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RichiestaInserisciContratto extends FormRequest {

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
            'id_annuncio' => ['required', 'unique:Contratto,id_annuncio,NULL,data_inizio,data_inizio,'.$this->input('data_inizio').'data_fine,data_fine,'.$this->input('data_fine')],
            'username_locatore' => 'required',
            'username_locatario' => 'required',
            'data_inizio' => ['required','date_format:Y-m-d','after:yesterday','unique:Contratto,data_inizio,NULL,data_fine,data_fine,'.$this->input('data_fine').'id_annuncio,id_annuncio,'.$this->input('id_annuncio')],
            'data_fine' => ['required','date_format:Y-m-d','after:data_inizio','unique:Contratto,data_fine,NULL,data_inizio,data_inizio,'.$this->input('data_inizio').'id_annuncio,id_annuncio,'.$this->input('id_annuncio')]
        ];
    }

}
