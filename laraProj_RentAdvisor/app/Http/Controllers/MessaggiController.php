<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resources\Messaggio;
use App\User;

class MessaggiController extends Controller
{
    protected $modello_messaggio;
    protected $modello_user;

    public function __construct(){
        $this->$modello_user = new User;
        $this->modello_messaggio = new Messaggio;
    }

    public function mostra_messaggi_chat(){
        $user = $this->modello_user::where('username', auth()->user()->username)->get()->first();
        $messaggi = $this->modello_messaggio->get_utenti_ultimi_messaggi_locatore(auth()->user()->username);
        return view('views_html/messaggi')
            ->with('user', $user)
            ->with('messaggi', $messaggi);
    }
}
