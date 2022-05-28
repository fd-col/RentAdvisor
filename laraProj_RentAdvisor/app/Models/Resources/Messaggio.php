<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
    protected $table = 'Messaggio';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function get_utenti_ultimi_messaggi_locatore($username_locatore) {
        $messaggi = $this::select('username_locatore', 'username_locatario')->distinct()->where('username_locatore', $username_locatore)->take(10)->get();
        return $messaggi;
    }
}
