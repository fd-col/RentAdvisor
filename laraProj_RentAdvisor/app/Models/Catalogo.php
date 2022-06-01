<?php

namespace App\Models;

use DateTime;
use ErrorException;
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
        if (is_null($numero_annunci)) {
            $annunci = Annuncio::select()->orderBy('data_inserimento', 'DESC')->paginate(9);
        }else
            $annunci = Annuncio::select()->orderBy('data_inserimento', 'DESC')->get()->take($numero_annunci);
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

    // Restituisce gli annunci che un locatario ha opzionato
    public function get_annunci_opzionati_locatario ($username_locatario) {
        $opzioni_annunci = Opzione_Annuncio::where('username_locatario', $username_locatario)->get();
        $array_id_annunci_opzionati = array();
        foreach ($opzioni_annunci as $opzione_annuncio)
            array_push($array_id_annunci_opzionati, $opzione_annuncio->id_annuncio);

        $annunci_opzionati = Annuncio::whereIn('id', $array_id_annunci_opzionati)->orderBy('data_inserimento', 'DESC')->paginate(6);
        return $annunci_opzionati;
    }

    // Restituisce gli utenti che hanno opzionato unn determinato annuncio
    public function get_utenti_opzioni_annuncio_locatore ($id_annuncio) {
        $opzioni_annunci = Opzione_Annuncio::where('id_annuncio', $id_annuncio)->get();
        $array_username_opzioni = array();
        foreach ($opzioni_annunci as $opzione_annuncio)
            array_push($array_username_opzioni, $opzione_annuncio->username_locatario);

        $locatari_opzione = User::whereIn('username', $array_username_opzioni)->get();
        return $locatari_opzione;
    }

	public function get_annunci_filtrati($filtri){

    $id_annunci_filtrati = array();
    if($filtri['tipologia'] == 'appartamento') {
        $appartamenti = Appartamento::select();
        if($filtri['tipologia_appartamento'])
            $appartamenti->where('tipologia_appartamento', $filtri['tipologia_appartamento']);
        if(!is_null($filtri['numero_camere']))
            $appartamenti->where('numero_camere', '>=', $filtri['numero_camere']);
        if(!is_null($filtri['appartamento_min']))
            $appartamenti->where('dimensioni_appartamento','>=', $filtri['appartamento_min']);
        if(!is_null($filtri['appartamento_max']))
            $appartamenti->where('dimensioni_appartamento','<=', $filtri['appartamento_max']);
        if(isset($filtri['cucina']))
            $appartamenti->where('presenza_cucina', $filtri['cucina']);
        if(isset($filtri['locale_ricreativo']))
            $appartamenti->where('presenza_locale_ricreativo', $filtri['locale_ricreativo']);
        $risultati = $appartamenti->get();
        foreach ($risultati as $risultato)
            array_push($id_annunci_filtrati, $risultato->id_annuncio);
    }

    if ($filtri['tipologia'] == 'posto_letto') {
        $posti_letto = Posto_Letto::select();
        if($filtri['tipologia_posto_letto'])
            $posti_letto->where('tipologia_posto_letto', $filtri['tipologia_posto_letto']);
        if(!is_null($filtri['letti_camera']))
            $posti_letto->where('letti_nella_camera', '>=', $filtri['letti_camera']);
        if(!is_null($filtri['dim_camera_min']))
            $posti_letto->where('dimensioni_camera','>=', $filtri['dim_camera_min']);
        if(!is_null($filtri['dim_camera_max']))
            $posti_letto->where('dimensioni_camera', $filtri['dim_camera_max']);
        if(isset($filtri['angolo_studio']))
            $posti_letto->where('presenza_angolo_studio', $filtri['angolo_studio']);
        $risultati = $posti_letto->get();
        foreach ($risultati as $risultato)
            array_push($id_annunci_filtrati, $risultato->id_annuncio);
    }

    $query = Annuncio::select();
    if ($filtri['tipologia'] == 'appartamento' or $filtri['tipologia'] == 'posto_letto')
        $query->whereIn('id', $id_annunci_filtrati);
	if(!is_null($filtri['titolo'])) {
        foreach (explode(' ', $filtri['titolo']) as $stringa) {
            $query->where('titolo', 'like', '%'.$stringa.'%')->orWhere('descrizione', 'like', '%'.$stringa.'%');
        }
    }
	if($filtri['genere'])
		$query->where('genere_preferito', $filtri['genere']);
	if(!is_null($filtri['citta']))
		$query->where('citta', $filtri['citta']);
	if(!is_null($filtri['zona_localizzazione']))
		$query->where('zona_di_localizzazione', $filtri['zona_localizzazione']);
	if(!is_null($filtri['caparra_max']))
		$query->where('caparra','<=', $filtri['caparra_max']);
	if(!is_null($filtri['affitto_max']))
		$query->where('canone_affitto','<=', $filtri['affitto_max']);
	if(!is_null($filtri['locazione_inizio']))
		$query->where('periodo_disponibilita_inizio','<=', $filtri['locazione_inizio']);
	if(!is_null($filtri['locazione_fine']))
		$query->where('periodo_disponibilita_fine','>=', $filtri['locazione_fine'])->orWhere('periodo_disponibilita_fine', null);
	if(!is_null($filtri['bagni']))
		$query->where('numero_bagni', '>=', $filtri['bagni']);
	if(!is_null($filtri['n_posti_letto_totali']))
		$query->where('numero_posti_letto_totali_alloggio', $filtri['n_posti_letto_totali']);
	if(!is_null($filtri['piano']))
		$query->where('piano', '<=', $filtri['piano']);
	if(isset($filtri['fumatori']))
		$query->where('fumatori', $filtri['fumatori']);
	if(isset($filtri['parcheggio']))
		$query->where('parcheggio', $filtri['parcheggio']);
	if(isset($filtri['wi_fi']))
		$query->where('wi_fi', $filtri['wi_fi']);
	if(isset($filtri['ascensore']))
		$query->where('ascensore', $filtri['ascensore']);

    $annunci = $query->orderBy('data_inserimento', 'DESC')->paginate(9);
    Log::debug('Dati validi: ', $filtri);
	return $annunci;
	}

    public function inserisci_dati_annuncio($dati_validi) {
        //Imposto la timezone per settare bene la data di inserimento dell'annuncio
        date_default_timezone_set('Europe/Rome');

        //Ritorno l''annuncio appena inserito per utilizzarlo nell'inserimento dei dati nelle altre tabelle
        $id_annuncio_inserito = Annuncio::insertGetId(['username_locatore' => auth()->user()->username, 'titolo' => $dati_validi['titolo'], 'descrizione' => $dati_validi['descrizione'], 'tipologia' =>$dati_validi['tipologia'], 'data_inserimento' => date('Y-m-d H:m:s'), 'provincia' => $dati_validi['provincia'],
            'citta' => $dati_validi['citta'], 'cap' => $dati_validi['cap'], 'zona_di_localizzazione' => $dati_validi['zona_di_localizzazione'], 'indirizzo' => $dati_validi['indirizzo'],
            'numero_civico' => $dati_validi['numero_civico'], 'piano' => $dati_validi['piano'], 'numero_posti_letto_totali_alloggio' => $dati_validi['numero_posti_letto_totali_alloggio'],
            'numero_bagni' => $dati_validi['numero_bagni'], 'fumatori' => $dati_validi['fumatori'], 'parcheggio' => $dati_validi['parcheggio'], 'wi_fi' => $dati_validi['wi_fi'],
            'ascensore' => $dati_validi['ascensore'], 'canone_affitto' => $dati_validi['canone_affitto'], 'caparra' => $dati_validi['caparra'], 'durata_minima_locazione' => $dati_validi['durata_minima_locazione'],
            'genere_preferito' => $dati_validi['genere_preferito'], 'eta_preferita_min' => $dati_validi['eta_preferita_min'], 'eta_preferita_max' => $dati_validi['eta_preferita_max'],
            'periodo_disponibilita_inizio' => $dati_validi['periodo_disponibilita_inizio'], 'periodo_disponibilita_fine' => $dati_validi['periodo_disponibilita_fine']]);

        if ($dati_validi['tipologia'] == 'appartamento')
            Appartamento::insert(['id_annuncio' => $id_annuncio_inserito, 'numero_camere' => $dati_validi['numero_camere'], 'dimensioni_appartamento' => $dati_validi['dimensioni_appartamento'], 'presenza_cucina' => $dati_validi['presenza_cucina'],
                'presenza_locale_ricreativo' => $dati_validi['presenza_locale_ricreativo'],'tipologia_appartamento' => $dati_validi['tipologia_appartamento']]);
        else
            Posto_Letto::insert(['id_annuncio' => $id_annuncio_inserito, 'tipologia_posto_letto' => $dati_validi['tipologia_posto_letto'], 'dimensioni_camera' => $dati_validi['dimensioni_camera'],
                'letti_nella_camera' => $dati_validi['letti_nella_camera'], 'presenza_angolo_studio' => $dati_validi['presenza_angolo_studio']]);

        return $id_annuncio_inserito;
    }

    public function inserisci_dati_immagine($nome_immagine, $id_annuncio_inserito) {
        Immagine::insert(['id_annuncio' => $id_annuncio_inserito, 'nome_immagine' => $nome_immagine]);
    }

    public function modifica_dati_annuncio($dati_validi) {
        Annuncio::where('id', $dati_validi['id'])->limit(1)->update(['titolo' => $dati_validi['titolo'], 'descrizione' => $dati_validi['descrizione'], 'provincia' => $dati_validi['provincia'],
            'citta' => $dati_validi['citta'], 'cap' => $dati_validi['cap'], 'zona_di_localizzazione' => $dati_validi['zona_di_localizzazione'], 'indirizzo' => $dati_validi['indirizzo'],
            'numero_civico' => $dati_validi['numero_civico'], 'piano' => $dati_validi['piano'], 'numero_posti_letto_totali_alloggio' => $dati_validi['numero_posti_letto_totali_alloggio'],
            'numero_bagni' => $dati_validi['numero_bagni'], 'fumatori' => $dati_validi['fumatori'], 'parcheggio' => $dati_validi['parcheggio'], 'wi_fi' => $dati_validi['wi_fi'],
            'ascensore' => $dati_validi['ascensore'], 'canone_affitto' => $dati_validi['canone_affitto'], 'caparra' => $dati_validi['caparra'], 'durata_minima_locazione' => $dati_validi['durata_minima_locazione'],
            'genere_preferito' => $dati_validi['genere_preferito'], 'eta_preferita_min' => $dati_validi['eta_preferita_min'], 'eta_preferita_max' => $dati_validi['eta_preferita_max'],
            'periodo_disponibilita_inizio' => $dati_validi['periodo_disponibilita_inizio'], 'periodo_disponibilita_fine' => $dati_validi['periodo_disponibilita_fine']]);

        if ($dati_validi['tipologia'] == 'appartamento')
            Appartamento::where('id_annuncio', $dati_validi['id'])->limit(1)->update(['numero_camere' => $dati_validi['numero_camere'], 'dimensioni_appartamento' => $dati_validi['dimensioni_appartamento'], 'presenza_cucina' => $dati_validi['presenza_cucina'],
                'presenza_locale_ricreativo' => $dati_validi['presenza_locale_ricreativo'],'tipologia_appartamento' => $dati_validi['tipologia_appartamento']]);
        else
            Posto_Letto::where('id_annuncio', $dati_validi['id'])->limit(1)->update(['tipologia_posto_letto' => $dati_validi['tipologia_posto_letto'], 'dimensioni_camera' => $dati_validi['dimensioni_camera'],
                'letti_nella_camera' => $dati_validi['letti_nella_camera'], 'presenza_angolo_studio' => $dati_validi['presenza_angolo_studio']]);
    }

    public function elimina_dati_immagini($id_annuncio) {
        Immagine::where('id_annuncio', $id_annuncio)->delete();
    }

    public function elimina_annuncio ($id_annuncio) {
        //Elimina i riperimenti alle immagini di quell'annuncio
        Immagine::where('id_annuncio', $id_annuncio)->delete();
        //Elimina le opzioni riferite a quell'annuncio
        Opzione_Annuncio::where('id_annuncio', $id_annuncio)->delete();

        //Elimina le caratteristiche specifiche al tipo di alloggio di quell'annuncio
        if ($this->get_annuncio($id_annuncio)->tipologia == 'appartamento')
            Appartamento::where('id_annuncio', $id_annuncio)->delete();
        else
            Posto_Letto::where('id_annuncio', $id_annuncio)->delete();

        //Elimina l'annuncio
        Annuncio::where('id', $id_annuncio)->delete();
    }

    public function toggle_disponibile_annuncio ($id_annuncio) {
        //Imposto la timezone per settare bene la data di assegnazione dell'annuncio
        date_default_timezone_set('Europe/Rome');
        if(Annuncio::where('id', $id_annuncio)->get()->first()->disponibile)
            Annuncio::where('id', $id_annuncio)->limit(1)->update(['disponibile' => '0']);
        else
            Annuncio::where('id', $id_annuncio)->limit(1)->update(['disponibile' => '1']);
    }

    public function toggle_opzione_annuncio($id_annuncio) {
        //Imposto la timezone per settare bene la data di assegnazione dell'annuncio
        date_default_timezone_set('Europe/Rome');
        if(!is_null(Opzione_Annuncio::where('id_annuncio', $id_annuncio)->where('username_locatario', auth()->user()->username)->get()->first()))
            Opzione_Annuncio::where('id_annuncio', $id_annuncio)->where('username_locatario', auth()->user()->username)->limit(1)->delete();
        else
            Opzione_Annuncio::insert(['id_annuncio' => $id_annuncio, 'username_locatario' => auth()->user()->username, 'data_opzione' => date('Y-m-d H:m:s')]);
    }

    public function controlla_opzione ($id_annuncio) {
        try{
            if(!is_null(Opzione_Annuncio::where('username_locatario', auth()->user()->username)->where('id_annuncio', $id_annuncio)->get()->first()))
                return true;
        } catch (ErrorException $e) {
            return false;
        }

        return false;
    }
}
