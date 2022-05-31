<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Contratto extends Model
{
    protected $table = 'Contratto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Realazione One-To-One con Annuncio
    public function prodCat(){
        return $this->hasOne(Annuncio::class, 'id', 'id_annuncio');
    }
}
