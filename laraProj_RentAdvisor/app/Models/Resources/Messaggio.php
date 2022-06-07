<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Messaggio extends Model
{
    protected $table = 'Messaggio';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function get_utenti_ultimi_messaggi_locatore($username_locatore) {
        $messaggi = $this::select('username_locatario as username')->distinct()->where('username_locatore', $username_locatore)->take(10)->get();
        return $messaggi;
    }
	public function get_chat_locatore($username){
		$messaggi= $this::select('*')->where('username_locatore', auth()->user()->username)->where('username_locatario', $username)->orderBy('data_invio')->get();
		return $messaggi;
	}
	public function get_utenti_ultimi_messaggi_locatario($username_locatario) {
		$messaggi=$this::select('username_locatore as username')->distinct()->where('username_locatario', $username_locatario)->get();
		return $messaggi;
	}
	public function get_chat_locatario($username) {
		$messaggi= $this::select('*')->where('username_locatario', auth()->user()->username)->where('username_locatore', $username)->orderBy('data_invio')->get();
		return $messaggi;
	}

    public function inserisci_messaggio_opzione($username_locatore, $titolo_annuncio) {
        $this::insert(['username_locatore'=>$username_locatore, 'username_locatario'=>auth()->user()->username, 'data_invio'=>date("Y-m-d H:i:s"), 'testo'=>"Salve, sono interessato all'alloggio \"".$titolo_annuncio."\"", 'mittente'=>auth()->user()->role]);
    }

    public function inserisci_messaggio($dati_validi) {
        $this::insert(['username_locatore'=>$dati_validi['locatore'], 'username_locatario'=>$dati_validi['locatario'], 'data_invio'=>date("Y-m-d H:i:s"), 'testo'=>$dati_validi['testo'], 'mittente'=>auth()->user()->role]);
    }
}
