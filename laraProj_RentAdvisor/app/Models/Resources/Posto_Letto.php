<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Posto_Letto extends Model
{
    protected $table = 'Posto_Letto';
    protected $primaryKey = 'id_annuncio';
    public $timestamps = false;

    // Realazione One-To-One con Annuncio
    public function prodCat(){
        return $this->hasOne(Annuncio::class, 'id', 'id_annuncio');
    }
}
