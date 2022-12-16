<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use App\Http\Controllers\Controller;
use App\Models\Resources\Messaggio;
use App\Http\Requests\RichiestaChat;
use App\Http\Requests\RichiestaInvioMessaggio;
use Illuminate\Support\Facades\Log;
use App\User;

class MessaggiController extends Controller
{
    protected $modello_messaggio;
    protected $modello_user;

    public function __construct(){
        $this->modello_user = new User;
        $this->modello_messaggio = new Messaggio;
    }
	//mostra i messaggi della chat nella pagina "messaggi" di un locatore / locatario
    public function mostra_messaggi_chat(){
        $user = $this->modello_user::where('username', auth()->user()->username)->get()->first();
		if(auth()->user()->role=="locatore")
			$messaggi = $this->modello_messaggio->get_utenti_ultimi_messaggi_locatore(auth()->user()->username);
		else
			$messaggi= $this->modello_messaggio->get_utenti_ultimi_messaggi_locatario(auth()->user()->username);

        return view('views_html/messaggi')
            ->with('user', $user)
            ->with('messaggi', $messaggi);
    }
	//mostra i messaggi della chat relativi ad un appartamento opzionato e accessibili da "Contatta il locatore"(nel caso del locatario)
	public function mostra_messaggi_chat_opzione($utente){
        $user = $this->modello_user->get_utente(auth()->user()->username);
		if(auth()->user()->role=="locatore")
			$messaggi = $this->modello_messaggio->get_utenti_ultimi_messaggi_locatore(auth()->user()->username);
		else
			$messaggi= $this->modello_messaggio->get_utenti_ultimi_messaggi_locatario(auth()->user()->username);
		return view('views_html/messaggi')
            ->with('user', $user)
            ->with('messaggi', $messaggi)
			->with('user_message', $utente);
	}
	public function mostra_chat_locatore(RichiestaChat $data){
		$dati_validi=$data->validated();
		$messaggi=$this->modello_messaggio->get_chat_locatore($dati_validi);
		return response()->json($messaggi->toJson());
	}
	public function mostra_chat_locatario(RichiestaChat $data) {
		$dati_validi=$data->validated();
		$messaggi=$this->modello_messaggio->get_chat_locatario($dati_validi);
		return response()->json($messaggi->toJson());
	}
	//invio messaggio dalla pagina "messaggi"
	public function invia_messaggio(RichiestaInvioMessaggio $data){
		$dati_validi=$data->validated();
		$this->modello_messaggio->inserisci_messaggio($dati_validi);
		if(auth()->user()->role=="locatario")
			$user=["user"=>$dati_validi['locatore']];
		else
			$user=["user"=>$dati_validi['locatario']];
		return response()->json(json_encode($user));
	}
}
