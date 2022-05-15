<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Opzione_Annuncio extends Model
{
    protected $table = 'opzione_annuncio';
    protected $primaryKey = ['username_locatario','id_annuncio'];
    public $timestamps = false;
}
