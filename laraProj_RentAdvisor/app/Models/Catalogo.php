<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Posto_Letto;
use App\Models\Resources\Appartamento;
use Illuminate\Support\Facades\DB;


class Catalogo extends Model
{
    public function get_annunci() {
        $annunci = Annuncio::select()->get();
        return $annunci;
    }
}
