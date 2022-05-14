<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{
    protected $table = 'annuncio';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
