<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfiloController extends Controller
{
    protected $modello_user;

    public function __construct(){
        $this->modello_user = new User;
    }
    public function pagina_profilo_locatario(){

        $user = $this->modello_user::where('username', auth()->user()->username)->get()->first();
        return view('views_html/visualizza_profilo_locatario')
        ->with('user', $user);
    }
    public function pagina_profilo_locatore(){

        $user = $this->modello_user::where('username', auth()->user()->username)->get()->first();
        return view('views_html/area_personale_locatore')
        ->with('user', $user);
    }
}
