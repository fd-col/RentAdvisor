<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
    protected $table = 'Messaggio';
    protected $primaryKey = ['username_locatore', 'username_locatario', 'data_invio'];
    public $timestamps = false;
}
