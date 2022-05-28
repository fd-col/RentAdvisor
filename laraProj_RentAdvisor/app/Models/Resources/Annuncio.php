<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{
    protected $table = 'Annuncio';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
}
