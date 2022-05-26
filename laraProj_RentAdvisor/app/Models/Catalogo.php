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
	$annunci=Annuncio::join('Appartamento', 'Annuncio.id', 'Appartamento.id_annuncio')
			->join('Posto_Letto'. 'Annuncio.id', 'Posto_Letto.id_annuncio');
	if(!is_null($filtri['titolo']))
		$annunci->where('Annuncio.titolo',$filtri['titolo']);
	if($filtri['tipologia'])
		$annunci->where('Annuncio.tipologia', $filtri['tipologia']);
	if($filtri['genere'])
		$annunci->where('Annuncio.genere_preferito', $filtri['genere']);
	if(!is_null($filtri['citta']))
		$annunci->where('Annuncio.citta', $filtri['citta']);
	if(!is_null($filtri['zona']))
		$annunci->where('Annuncio.zona_di_localizzazione', $filtri['zona']);
	if(!is_null($filtri['caparra_max']))
		$annunci->where('Annuncio.caparra','<=', $filtri['caparra_max']);
	if(!is_null($filtri['affitto_max']))
		$annunci->where('Annuncio.affitto','<=', $filtri['affitto_max']);
	if(!is_null($filtri['locazione_inizio']))
		$annunci->where('Annuncio.periodo_disponibilita_inizio','<', $filtri['locazione_inizio']);
	if(!is_null($filtri['locazione_fine']))
		$annunci->where('Annuncio.periodo_disponibilita_fine','>', $filtri['locazione_fine']);
	if(!is_null($filtri['bagni']))
		$annunci->where('Annuncio.numero_bagni', $filtri['bagni']);
	if(!is_null($filtri['n_posti_letto_totali']))
		$annunci->where('Annuncio.numero_posti_letto_totali_alloggio', $filtri['n_posti_letto_totali']);
	if(!is_null($filtri['piano']))
		$annunci->where('Annuncio.piano', $filtri['piano']);
	if(!is_null($filtri['fumatori']))
		$annunci->where('Annuncio.fumatori', $filtri['fumatori']);
	if(!is_null($filtri['parcheggio']))
		$annunci->where('Annuncio.parcheggio', $filtri['parcheggio']);
	if(!is_null($filtri['wi_fi']))
		$annunci->where('Annuncio.wi_fi', $filtri['wi_fi']);
	if(!is_null($filtri['ascensore']))
		$annunci->where('Annuncio.ascensore', $filtri['ascensore']);
	if(!is_null($filtri['numero_camere']))
		$annunci->where('Appartamento.numero_camere', $filtri['numero_camere']);
	if(!is_null($filtri['appartamento_min']))
		$annunci->where('Appartamento.dimensioni_appartamento','>=', $filtri['appartamento_min']);
	if(!is_null($filtri['appartamento_max']))
		$annunci->where('Appartamento.dimensioni_appartamento','<=', $filtri['appartamento_max']);
	if(!is_null($filtri['locazione_inizio']))
		$annunci->where('Appartamento.periodo_disponibilita_inizio', $filtri['locazione_inizio']);
	if($filtri['tipologia_appartamento'])
		$annunci->where('Appartamento.tipologia_appartamento', $filtri['tipologia_appartamento']);
	if(!is_null($filtri['locale_ricreativo']))
		$annunci->where('Appartamento.periodo_disponibilita_inizio', $filtri['locazione_inizio']);
	if(!is_null($filtri['letti_camera']))
		$annunci->where('Posto_Letto.letti_nella_camera', $filtri['letti_camera']);
	if(!is_null($filtri['dim_camera_min']))
		$annunci->where('Posto_Letto.dimensioni_camera','>=', $filtri['dim_camera_min']);
	if(!is_null($filtri['dim_camera_max']))
		$annunci->where('Posto_Letto.dimensioni_camera', $filtri['dim_camera_max']);
	if($filtri['tipologia_posto_letto'])
		$annunci->where('Posto_Letto.tipologia_posto_letto', $filtri['tipologia_posto_letto']);
	if(!is_null($filtri['angolo_studio']))
		$annunci->where('Posto_Letto.presenza_angolo_studio', $filtri['angolo_studio']);

	return $annunci;
	}
}
