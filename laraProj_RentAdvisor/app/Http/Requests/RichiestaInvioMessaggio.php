<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RichiestaInvioMessaggio extends FormRequest {

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
            'locatore' => 'required|max:40',
            'locatario' => 'required|max:40',
			'testo'=>'required|max:500',
			
        ];
    }
	public function messages(){
		return [
			'locatore.required'=>'Selezionare un locatore a cui inviare il messaggio',
			'locatario.required'=>'Selezionare un locatario a cui inviare il messaggio',
		];
	}

}
