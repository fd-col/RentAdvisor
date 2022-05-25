<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Posto_Letto;
use App\Models\Resources\Appartamento;
use App\Models\Resources\Immagine;
use App\User;


class Catalogo extends Model
{
    public function get_annunci($numero_annunci=null) {
        if (is_null($numero_annunci))
            $annunci = Annuncio::select()->where('disponibile', true)->orderBy('data_inserimento')->paginate(9);
        else
            $annunci = Annuncio::select()->where('disponibile', true)->orderBy('data_inserimento')->get()->take($numero_annunci);
        return $annunci;
    }

    public function get_annuncio($id_annuncio) {
        $annuncio = Annuncio::where('id', $id_annuncio)->get()->first();
        return $annuncio;
    }

    public function get_caratteristiche_annuncio ($annuncio) {
        if ($annuncio->tipologia == 'appartamento') {
            $caratteristiche = Appartamento::where('id_annuncio', $annuncio->id)->get()->first();
            return $caratteristiche;
        }

        if ($annuncio->tipologia == 'posto_letto') {
            $caratteristiche = Posto_Letto::where('id_annuncio', $annuncio->id)->get()->first();
            return $caratteristiche;
        }
    }

    public function get_immagini_annuncio($id_annuncio) {
        $immagini = Immagine::where('id_annuncio', $id_annuncio)->get();
        return $immagini;
    }

    public function get_immagini_annunci($annunci) {
        $id_annunci = array();
        foreach ($annunci as $annuncio)
            array_push($id_annunci, $annuncio->id);
        $immagini = Immagine::whereIn('id_annuncio', $id_annunci)->get();
        return $immagini;
    }

    public function get_locatore_annuncio($annuncio) {
        $locatore = User::where('username', $annuncio->username_locatore)->get()->first();
        return $locatore;
    }

    public function get_annunci_locatore($username_locatore) {
        $annunci = Annuncio::where('username_locatore', $username_locatore)->orderBy('data_inserimento')->paginate(4);
        return $annunci;
    }
	public function get_annunci_filtrati($filtri){
	$annunci=Annuncio::join('Appartamento', 'Annuncio.id', 'Appartamento.id_annuncio');
	$annunci=$annunci->join('Posto_Letto'. 'Annuncio.id', 'Posto_Letto.id_annuncio');
	if(isset($filtri['titolo']))
		$annunci=$annunci->where('Annuncio.titolo',$filtri['titolo']);
	if($filtri['tipologia'])
		$annunci=$annunci->where('Annuncio.tipologia', $filtri['tipologia']);
	if($filtri['genere'])
		$annunci=$annunci->where('Annuncio.genere_preferito', $filtri['genere']);
	if(isset($filtri['citta']))
		$annunci=$annunci->where('Annuncio.citta', $filtri['citta']);
	if(isset($filtri['zona']))
		$annunci=$annunci->where('Annuncio.zona_di_localizzazione', $filtri['zona']);
	if(isset($filtri['caparra_max']))
		$annunci=$annunci->where('Annuncio.caparra','<=', $filtri['caparra_max']);
	if(isset($filtri['affitto_max']))
		$annunci=$annunci->where('Annuncio.affitto','<=', $filtri['affitto_max']);
	if(isset($filtri['locazione_inizio']))
		$annunci=$annunci->where('Annuncio.periodo_disponibilita_inizio','<', $filtri['locazione_inizio']);
	if(isset($filtri['locazione_fine']))
		$annunci=$annunci->where('Annuncio.periodo_disponibilita_fine','>', $filtri['locazione_fine']);
	if(isset($filtri['bagni']))
		$annunci=$annunci->where('Annuncio.numero_bagni', $filtri['bagni']);
	if(isset($filtri['n_posti_letto_totali']))
		$annunci=$annunci->where('Annuncio.numero_posti_letto_totali_alloggio', $filtri['n_posti_letto_totali']);
	if(isset($filtri['piano']))
		$annunci=$annunci->where('Annuncio.piano', $filtri['piano']);
	if(isset($filtri['fumatori']))
		$annunci=$annunci->where('Annuncio.fumatori', $filtri['fumatori']);
	if(isset($filtri['parcheggio']))
		$annunci=$annunci->where('Annuncio.parcheggio', $filtri['parcheggio']);
	if(isset($filtri['wi_fi']))
		$annunci=$annunci->where('Annuncio.wi_fi', $filtri['wi_fi']);
	if(isset($filtri['ascensore']))
		$annunci=$annunci->where('Annuncio.ascensore', $filtri['ascensore']);
	if(isset($filtri['numero_camere']))
		$annunci=$annunci->where('Appartamento.numero_camere', $filtri['numero_camere']);
	if(isset($filtri['appartamento_min']))
		$annunci=$annunci->where('Appartamento.dimensioni_appartamento','>=', $filtri['appartamento_min']);
	if(isset($filtri['appartamento_max']))
		$annunci=$annunci->where('Appartamento.dimensioni_appartamento','<=', $filtri['appartamento_max']);
	if(isset($filtri['locazione_inizio']))
		$annunci=$annunci->where('Appartamento.periodo_disponibilita_inizio', $filtri['locazione_inizio']);
	if($filtri['tipologia_appartamento'])
		$annunci=$annunci->where('Appartamento.tipologia_appartamento', $filtri['tipologia_appartamento']);
	if(isset($filtri['locale_ricreativo']))
		$annunci=$annunci->where('Appartamento.periodo_disponibilita_inizio', $filtri['locazione_inizio']);
	if(isset($filtri['letti_camera']))
		$annunci=$annunci->where('Posto_Letto.letti_nella_camera', $filtri['letti_camera']);
	if(isset($filtri['dim_camera_min']))
		$annunci=$annunci->where('Posto_Letto.dimensioni_camera','>=', $filtri['dim_camera_min']);
	if(isset($filtri['dim_camera_max']))
		$annunci=$annunci->where('Posto_Letto.dimensioni_camera', $filtri['dim_camera_max']);
	if($filtri['tipologia_posto_letto'])
		$annunci=$annunci->where('Posto_Letto.tipologia_posto_letto', $filtri['tipologia_posto_letto']);
	if(isset($filtri['angolo_studio']))
		$annunci=$annunci->where('Posto_Letto.presenza_angolo_studio', $filtri['angolo_studio']);

	return $annunci;
	}
}
