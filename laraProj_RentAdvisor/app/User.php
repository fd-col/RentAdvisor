<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'email', 'username', 'password', 'role', 'data_nascita', 'genere', 'telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }

    public function get_utente ($username) {
        $utente = $this::where('username', $username)->get()->first();
        return $utente;
    }

    public function modifica_dati_utente($dati_validi) {
        $this::where('username', $dati_validi['username'])
            ->limit(1)//ulteriore parametro di sicurezza, con limit(1) si può modificare solo la tupla con quell'username (anche se è già unica)
            ->update(['nome' => $dati_validi['nome'], 'cognome' => $dati_validi['cognome'], 'genere' => $dati_validi['genere'], 'data_nascita' => $dati_validi['data_nascita'], 'telefono' => $dati_validi['telefono']]);
    }

}
