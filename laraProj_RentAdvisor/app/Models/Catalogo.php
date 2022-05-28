<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Posto_Letto;
use App\Models\Resources\Appartamento;
use App\Models\Resources\Immagine;
use App\Models\Resources\Opzione_Annuncio;
use App\User;
use Illuminate\Support\Facades\Log;

class Catalogo extends Model
{
    public function get_annunci($numero_annunci=null) {
        if (is_null($numero_annunci))
            $annunci = Annuncio::select()->where('disponibile', true)->orderBy('data_inserimento', 'DESC')->paginate(9);
        else
            $annunci = Annuncio::select()->where('disponibile', true)->orderBy('data_inserimento', 'DESC')->get()->take($numero_annunci);
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
        $annunci = Annuncio::where('username_locatore', $username_locatore)->orderBy('data_inserimento', 'DESC')->paginate(4);
        return $annunci;
    }

    public function get_annunci_opzionati_locatario ($username_locatario) {
        $opzioni_annunci = Opzione_Annuncio::where('username_locatario', $username_locatario)->get();
        $array_id_annunci_opzionati = array();
        foreach ($opzioni_annunci as $opzione_annuncio)
            array_push($array_id_annunci_opzionati, $opzione_annuncio->id_annuncio);

        $annunci_opzionati = Annuncio::whereIn('id', $array_id_annunci_opzionati)->orderBy('data_inserimento', 'DESC')->paginate(6);
        return $annunci_opzionati;
    }

	public function get_annunci_filtrati($filtri){
	$annunci=Annuncio::leftJoin('Appartamento', 'Annuncio.id', '=', 'Appartamento.id_annuncio')
			->leftJoin('Posto_Letto', 'Annuncio.id', '=', 'Posto_Letto.id_annuncio');
	if(!is_null($filtri['titolo']))
		$annunci->where('Annuncio.titolo',$filtri['titolo']);
	if($filtri['tipologia'])
		$annunci->where('Annuncio.tipologia', $filtri['tipologia']);
	if($filtri['genere'])
		$annunci->where('Annuncio.genere_preferito', $filtri['genere']);
	if(!is_null($filtri['citta']))
		$annunci->where('Annuncio.citta', $filtri['citta']);
	if(!is_null($filtri['zona_localizzazione']))
		$annunci->where('Annuncio.zona_di_localizzazione', $filtri['zona_localizzazione']);
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
	if(isset($filtri['fumatori']))
		$annunci->where('Annuncio.fumatori', $filtri['fumatori']);
	if(isset($filtri['parcheggio']))
		$annunci->where('Annuncio.parcheggio', $filtri['parcheggio']);
	if(isset($filtri['wi_fi']))
		$annunci->where('Annuncio.wi_fi', $filtri['wi_fi']);
	if(isset($filtri['ascensore']))
		$annunci->where('Annuncio.ascensore', $filtri['ascensore']);
	if(!is_null($filtri['numero_camere']))
		$annunci->where('Appartamento.numero_camere', $filtri['numero_camere']);
	if(!is_null($filtri['appartamento_min']))
		$annunci->where('Appartamento.dimensioni_appartamento','>=', $filtri['appartamento_min']);
	if(!is_null($filtri['appartamento_max']))
		$annunci->where('Appartamento.dimensioni_appartamento','<=', $filtri['appartamento_max']);
	if(isset($filtri['cucina']))
		$annunci->where('Appartamento.presenza_cucina', $filtri['cucina']);
	if($filtri['tipologia_appartamento'])
		$annunci->where('Appartamento.tipologia_appartamento', $filtri['tipologia_appartamento']);
	if(isset($filtri['locale_ricreativo']))
		$annunci->where('Appartamento.periodo_disponibilita_inizio', $filtri['locazione_inizio']);
	if(!is_null($filtri['letti_camera']))
		$annunci->where('Posto_Letto.letti_nella_camera', $filtri['letti_camera']);
	if(!is_null($filtri['dim_camera_min']))
		$annunci->where('Posto_Letto.dimensioni_camera','>=', $filtri['dim_camera_min']);
	if(!is_null($filtri['dim_camera_max']))
		$annunci->where('Posto_Letto.dimensioni_camera', $filtri['dim_camera_max']);
	if($filtri['tipologia_posto_letto'])
		$annunci->where('Posto_Letto.tipologia_posto_letto', $filtri['tipologia_posto_letto']);
	if(isset($filtri['angolo_studio']))
		$annunci->where('Posto_Letto.presenza_angolo_studio', $filtri['angolo_studio']);
    $annunci->orderBy('data_inserimento', 'DESC');
    $annunci->paginate(9);
	return $annunci;
	}

    public function inserisci_dati_annuncio($dati_validi) {
        date_default_timezone_set('Europe/Rome');
        //Ritorno l''annuncio appena inserito per utilizzarlo nell'inserimento dei dati nelle altre tabelle
        return Annuncio::insertGetId(['username_locatore' => auth()->user()->username, 'titolo' => $dati_validi['titolo'], 'descrizione' => $dati_validi['descrizione'], 'tipologia' =>$dati_validi['tipologia'], 'data_inserimento' => date('Y-m-d H:m:s'), 'provincia' => $dati_validi['provincia'],
            'citta' => $dati_validi['citta'], 'cap' => $dati_validi['cap'], 'zona_di_localizzazione' => $dati_validi['zona_di_localizzazione'], 'indirizzo' => $dati_validi['indirizzo'],
            'numero_civico' => $dati_validi['numero_civico'], 'piano' => $dati_validi['piano'], 'numero_posti_letto_totali_alloggio' => $dati_validi['numero_posti_letto_totali_alloggio'],
            'numero_bagni' => $dati_validi['numero_bagni'], 'fumatori' => $dati_validi['fumatori'], 'parcheggio' => $dati_validi['parcheggio'], 'wi_fi' => $dati_validi['wi_fi'],
            'ascensore' => $dati_validi['ascensore'], 'canone_affitto' => $dati_validi['canone_affitto'], 'caparra' => $dati_validi['caparra'], 'durata_minima_locazione' => $dati_validi['durata_minima_locazione'],
            'genere_preferito' => $dati_validi['genere_preferito'], 'eta_preferita_min' => $dati_validi['eta_preferita_min'], 'eta_preferita_max' => $dati_validi['eta_preferita_max'],
            'periodo_disponibilita_inizio' => $dati_validi['periodo_disponibilita_inizio'], 'periodo_disponibilita_fine' => $dati_validi['periodo_disponibilita_fine']]);

    }

    public function inserisci_dati_appartamento($dati_validi, $id_annuncio_inserito) {
        Appartamento::insert(['id_annuncio' => $id_annuncio_inserito, 'numero_camere' => $dati_validi['numero_camere'], 'dimensioni_appartamento' => $dati_validi['dimensioni_appartamento'], 'presenza_cucina' => $dati_validi['presenza_cucina'],
                 'presenza_locale_ricreativo' => $dati_validi['presenza_locale_ricreativo'],'tipologia_appartamento' => $dati_validi['tipologia_appartamento']]);

    }

    public function inserisci_dati_posto_letto($dati_validi, $id_annuncio_inserito) {
        Posto_Letto::insert(['id_annuncio' => $id_annuncio_inserito, 'tipologia_posto_letto' => $dati_validi['tipologia_posto_letto'], 'dimensioni_camera' => $dati_validi['dimensioni_camera'],
            'letti_nella_camera' => $dati_validi['letti_nella_camera'], 'presenza_angolo_studio' => $dati_validi['presenza_angolo_studio']]);
    }

    public function inserisci_dati_immagine($nome_immagine, $id_annuncio_inserito) {
        Immagine::insert(['id_annuncio' => $id_annuncio_inserito, 'nome_immagine' => $nome_immagine]);
    }

    public function elimina_annuncio ($id_annuncio) {
        Immagine::where('id_annuncio', $id_annuncio)->delete();

        if ($this->get_annuncio($id_annuncio)->tipologia == 'appartamento')
            Appartamento::where('id_annuncio', $id_annuncio)->delete();
        else
            Posto_Letto::where('id_annuncio', $id_annuncio)->delete();

        Annuncio::where('id', $id_annuncio)->delete();
    }
}
