<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    const TITOLO_APPARTAMENTO = 'Appartamento in centro città con 4 stanze singole';
    const DESCRIZIONE_APPARTAMENTO = 'Affittasi appartamento in centro città vicino alla facoltà di economia composto da 4 stanze singole e 2 bagni, ammobiliato e con tutte le utenze intestate al proprietario. Richiesta caparra di 2 mesi';

    const TITOLO_POSTO_LETTO = 'Posto letto in stanza singola in appartamento vicino la facoltà di ingegneria';
    const DESCRIZIONE_POSTO_LETTO = 'Affittasi stanza singola in un\' appartamento appena ristrutturato situato vicino la facoltà di ingegneria in un tranquillo condominio';

    public function run() {


        DB::table('Utente')->insert([
            ['username' => 'admin', 'nome' => 'admin', 'cognome' => 'admin', 'genere' => 'ND', 'data_nascita' => '1900-01-01', 'email' => 'admin@admin.com', 'telefono' => null, 'psw' => 'admin', 'tipologia'=>'admin'],
            ['username' => 'mario', 'nome' => 'mario', 'cognome' => 'rossi', 'genere' => 'M', 'data_nascita' => '1990-09-22', 'email' => 'mario@rossi.it', 'telefono' => '1234567890', 'psw' => 'password', 'tipologia'=>'locatore'],
            ['username' => 'giovanna', 'nome' => 'giovanna', 'cognome' => 'bianchi', 'genere' => 'F', 'data_nascita' => '1985-07-15', 'email' => 'giovanna@bianchi.it', 'telefono' => '3859827631', 'psw' => 'password', 'tipologia'=>'locatore'],
            ['username' => 'luca', 'nome' => 'luca', 'cognome' => 'verdi', 'genere' => 'M', 'data_nascita' => '1998-12-12', 'email' => 'luca@verdi.it', 'telefono' => '8945762408', 'psw' => 'password', 'tipologia'=>'locatario'],
            ['username' => 'noemi', 'nome' => 'noemi', 'cognome' => 'del verde', 'genere' => 'ND', 'data_nascita' => '2001-05-12', 'email' => 'noemi@delverde.it', 'telefono' => null, 'psw' => 'password', 'tipologia'=>'locatario'],
			['username' => 'lorelore', 'nome' =>'Locatore', 'cognome' => 'Generico', 'genere' => 'ND', 'data_nascita' => '1990-01-01', 'email' => 'locatore@gmail.com', 'telefono' => null, 'psw' => 'fYq8SAgv', 'tipologia' => 'locatore'],
			['username' => 'lariolario', 'nome' =>'Locatario', 'cognome' => 'Generico', 'genere' => 'ND', 'data_nascita' => '1995-01-01', 'email' => 'locatario@gmail.com', 'telefono' => null, 'psw' => 'fYq8SAgv', 'tipologia' => 'locatario'],
			['username' => 'adminadmin', 'nome' =>'Admin', 'cognome' => 'Generico', 'genere' => 'ND', 'data_nascita' => '2000-01-01', 'email' => 'admin@gmail.com', 'telefono' => null, 'psw' => 'fYq8SAgv', 'tipologia' => 'admin']

        ]);

        DB::table('Annuncio')->insert([
            ['username_locatore' => 'mario', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento', 'data_inserimento' => '2022-05-14', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Viale della Vittoria', 'numero_civico' => '23', 'piano' => 4, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 800.00, 'caparra' => 1600.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 20, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'giovanna', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2022-06-24', 'disponibile' => false, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Piazza Cavour', 'numero_civico' => '2', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 1000.00, 'caparra' => 2000.00, 'durata_minima_locazione' => 10, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-10-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'mario', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-05-14', 'disponibile' => true, 'provincia' => 'PE', 'citta' => 'pescara', 'cap' => '12345', 'zona_di_localizzazione' => 'lungomare', 'indirizzo' => 'Via lungomare', 'numero_civico' => '14', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 6, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 300.00, 'caparra' => 600.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 22, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'giovanna', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-06-24', 'disponibile' => true, 'provincia' => 'CH', 'citta' => 'chieti', 'cap' => '12345', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Via della Liberazione', 'numero_civico' => '134/A', 'piano' => 5, 'numero_posti_letto_totali_alloggio' => 3, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 250.00, 'caparra' => 250.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2025-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-06-10', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'le grazie', 'indirizzo' => 'Via delle Grazie', 'numero_civico' => '7', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 5, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => false, 'canone_affitto' => 180.00, 'caparra' => 250.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 21, 'eta_preferita_max' => 24, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2026-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2022-06-11', 'disponibile' => true, 'provincia' => 'MC', 'citta' => 'macerata', 'cap' => '62100', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via dei Velini', 'numero_civico' => '15', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 2, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 250.00, 'caparra' => 200.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 18, 'eta_preferita_max' => 28, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-05-11', 'disponibile' => true, 'provincia' => 'FM', 'citta' => 'fermo', 'cap' => '63900', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Galileo Galilei', 'numero_civico' => '12', 'piano' => 3, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 180.00, 'caparra' => 100.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 18, 'eta_preferita_max' => 30, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2030-08-31'],
			['username_locatore' => 'mario', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-03-11', 'disponibile' => false, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '62123', 'zona_di_localizzazione' => 'tavernelle', 'indirizzo' => 'Via delle Tavernelle', 'numero_civico' => '1', 'piano' => 4, 'numero_posti_letto_totali_alloggio' => 6, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => false, 'canone_affitto' => 180.00, 'caparra' => 150.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 21, 'periodo_disponibilita_inizio' => '2023-09-01', 'periodo_disponibilita_fine' => '2024-08-31'],
			['username_locatore' => 'giovanna', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2022-05-11', 'disponibile' => true, 'provincia' => 'PE', 'citta' => 'pescara', 'cap' => '65121', 'zona_di_localizzazione' => 'lungomare', 'indirizzo' => 'Via lungomare', 'numero_civico' => '3', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 2, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 200.00, 'caparra' => 150.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 21, 'eta_preferita_max' => 23, 'periodo_disponibilita_inizio' => '2022-11-01', 'periodo_disponibilita_fine' => '2027-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2022-04-20', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '62123', 'zona_di_localizzazione' => 'torrette', 'indirizzo' => 'Via Tronto', 'numero_civico' => '17', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => false, 'canone_affitto' => 250.00, 'caparra' => 250.00, 'durata_minima_locazione' => 6, 'genere_preferito' => 'ND', 'eta_preferita_min' => 18, 'eta_preferita_max' => 21, 'periodo_disponibilita_inizio' => '2022-12-01', 'periodo_disponibilita_fine' => null],
			['username_locatore' => 'mario', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-03-30', 'disponibile' => true, 'provincia' => 'CH', 'citta' => 'chieti', 'cap' => '66100', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Colonnetta', 'numero_civico' => '10', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 5, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 100.00, 'caparra' => 80.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 19, 'eta_preferita_max' => 21, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
			['username_locatore' => 'giovanna', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::TITOLO_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2022-05-20', 'disponibile' => true, 'provincia' => 'FM', 'citta' => 'fermo', 'cap' => '63900', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Galileo Galilei', 'numero_civico' => '14', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 3, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => false, 'canone_affitto' => 180.00, 'caparra' => 120.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 22, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2025-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2022-06-01', 'disponibile' => true, 'provincia' => 'MC', 'citta' => 'macerata', 'cap' => '62100', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Roma', 'numero_civico' => '3/A', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 5, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 100.00, 'caparra' => 150.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 20, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2024-08-31']
		]);

        DB::table('Opzione_Annuncio')->insert([
            ['username_locatario' => 'luca', 'id_annuncio' => 1],
            ['username_locatario' => 'noemi', 'id_annuncio' => 4],
			['username_locatario' => 'lariolario', 'id_annuncio' => 5],
			['username_locatario' => 'lariolario', 'id_annuncio' => 1],
			['username_locatario' => 'luca', 'id_annuncio' => 10],
			['username_locatario' => 'noemi', 'id_annuncio' =>13],
			['username_locatario' => 'lariolario', 'id_annuncio' => 11]
        ]);

        DB::table('Appartamento')->insert([
            ['id_annuncio' => 1, 'numero_camere' => 4, 'dimensioni_appartamento' => 120, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => false, 'tipologia_appartamento' => 'appartamento'],
            ['id_annuncio' => 2, 'numero_camere' => 4, 'dimensioni_appartamento' => 180, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 6, 'numero_camere' => 2, 'dimensioni_appartamento' => 90, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => false, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 9, 'numero_camere' => 2, 'dimensioni_appartamento' => 100, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 10, 'numero_camere' => 4, 'dimensioni_appartamento' => 120, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 12, 'numero_camere' => 3, 'dimensioni_appartamento' => 90, 'presenza_cucina' => false, 'presenza_locale_ricreativo' =>false, 'tipologia_appartamento' => 'appartamento']
        ]);

        DB::table('Posto_Letto')->insert([
            ['id_annuncio' => 3, 'dimensioni_camera' => 15, 'letti_nella_camera' => 1, 'presenza_angolo_studio' => true, 'tipologia_posto_letto' => 'singola'],
            ['id_annuncio' => 4, 'dimensioni_camera' => 18, 'letti_nella_camera' => 2, 'presenza_angolo_studio' => false, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 5, 'dimensioni_camera' => 18, 'letti_nella_camera' => 1, 'presenza_angolo_studio' => true, 'tipologia_posto_letto' => 'singola'],
			['id_annuncio' => 7, 'dimensioni_camera' => 20, 'letti_nella_camera' => 2, 'presenza_angolo_studio' => false, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 8, 'dimensioni_camera' => 18, 'letti_nella_camera' => 2, 'presenza_angolo_studio' =>false, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 11, 'dimensioni_camera' => 30, 'letti_nella_camera' => 2, 'presenza_angolo_studio' =>true, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 13, 'dimensioni_camera' => 30, 'letti_nella_camera' => 2, 'presenza_angolo_studio' =>false, 'tipologia_posto_letto' => 'condivisa']
        ]);

        DB::table('Messaggio')->insert([
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 14:50:00', 'testo' => 'Salve sono interessato all\'annuncio sull\'appartamento', 'mittente' => 'locatario'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 14:55:00', 'testo' => 'Perfetto, è ancora disponibile', 'mittente' => 'locatore'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:04:32', 'testo' => 'Sarebbe possibile venire a vederlo?', 'mittente' => 'locatario'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:09:00', 'testo' => 'Certo, le va bene domattina?', 'mittente' => 'locatore'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:12:00', 'testo' => 'Sisi, facciamo alle 10?', 'mittente' => 'locatario'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:15:34', 'testo' => 'Perfetto, a domattina', 'mittente' => 'locatore'],
            ['username_locatore' => 'giovanna', 'username_locatario' => 'noemi', 'data_invio' => '2022-05-22 18:09:00', 'testo' => 'Salve, sarei interessata all\'annuncio sulla camera singola, è possibile venire a vederla?', 'mittente' => 'locatario'],
			['username_locatore' => 'lorelore', 'username_locatario' => 'lariolario', 'data_invio' => '2022-06-06 15:00:00', 'testo' => 'Salve, sarei interessato all\'annuncio sulla camera singola.', 'mittente' => 'locatore'],
			['username_locatore' => 'giovanna', 'username_locatario' => 'lariolario', 'data_invio' => '2022-06-07 18:00:00', 'testo' => 'Salve, sarei interessato all\'annuncio sull\'appartamento.', 'mittente' => 'locatore'],
			['username_locatore' => 'lorelore', 'username_locatario' => 'luca', 'data_invio' => '2022-06-11 15:01:59', 'testo' => 'Salve, sarei interessato all\'annuncio sull\'appartamento.', 'mittente' => 'locatore'],
			['username_locatore' => 'lorelore', 'username_locatario' => 'noemi', 'data_invio' => '2022-06-11 17:00:00', 'testo' => 'Salve, sarei interessato all\'annuncio sul posto letto.', 'mittente' => 'locatore'],
			['username_locatore' => 'mario', 'username_locatario' => 'lariolario', 'data_invio' => '2022-06-11 20:02:31', 'testo' => 'Salve, sarei interessato all\'annuncio sulla camera condivisa.', 'mittente' => 'locatore'],
		]);

        DB::table('FAQ')->insert([
            ['domanda' => 'Come posso inserire un annuncio sul sito?' , 'risposta' => 'Per inserire un annuncio bisogna essere loggati con un account da locatore, accedendo alla propria area personale basterà poi cliccare sul pulsante inserisci annuncio'],
            ['domanda' => 'Come faccio a contattare un locatore?', 'risposta' => 'Per contattare un locatore bisogna opzionare l\'annuncio al quale sei interessato, da lì verrai direttamente reindirizzato alla pagina di messagistica dove potrai parlare con il locatore che ha inserito l\'annuncio'],
            ['domanda' => 'Dove posso vedere tutti gli annunci che ho inserito?', 'risposta' => 'Tutti gli annunci da te inseriti sono all\'interno della tua area personale alla quale pui accedere dalla navbar dopo aver fatto il log-in']
        ]);

    }

}
