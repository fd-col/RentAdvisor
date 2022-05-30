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
        $messaggi = $this::select('username_locatore', 'username_locatario')->distinct()->where('username_locatore', $username_locatore)->take(10)->get();
        return $messaggi;
    }
	public function get_chat_locatore($username){
		$messaggi= $this::select('*')->where('username_locatore', auth()->user()->username)->where('username_locatario', $username)->orderBy('data_invio')->get();
		return $messaggi;
	}
	public function get_utenti_ultimi_messaggi_locatario($username_locatario) {
		$messaggi=$this::select('username_locatore', 'username_locatario')->distinct()->where('username_locatario', $username_locatario)->get();
		return $messaggi;
	}
	public function get_chat_locatario($username) {
		$messaggi= $this::select('*')->where('username_locatario', auth()->user()->username)->where('username_locatore', $username)->orderBy('data_invio')->get();
		return $messaggi;
	}
}
