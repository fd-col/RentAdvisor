<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
	public function invia_messaggio(RichiestaInvioMessaggio $data){
		$dati_validi=$data->validated();
		Log::debug($dati_validi);
		$this->modello_messaggio::insert(['username_locatore'=>$dati_validi['locatore'], 'username_locatario'=>$dati_validi['locatario'], 'data_invio'=>date("Y-m-d H:i:s"), 'testo'=>$dati_validi['testo'], 'mittente'=>auth()->user()->role]);
		
		return redirect()->action('MessaggiController@mostra_messaggi_chat');
	}
}
