<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Immagine extends Model
{
    protected $table = 'Immagine';
    protected $primaryKey = ['id_annuncio', 'nome_immagine'];
    public $timestamps = false;

}
