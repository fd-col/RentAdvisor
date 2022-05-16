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


        DB::table('utente')->insert([
            ['username' => 'admin', 'nome' => 'admin', 'cognome' => 'admin', 'genere' => 'ND', 'data_nascita' => '1900-01-01', 'email' => 'admin@admin.com', 'telefono' => null, 'psw' => 'admin', 'tipologia'=>'admin'],
            ['username' => 'mario', 'nome' => 'mario', 'cognome' => 'rossi', 'genere' => 'M', 'data_nascita' => '1990-09-22', 'email' => 'mario@rossi.it', 'telefono' => '1234567890', 'psw' => 'password', 'tipologia'=>'locatore'],
            ['username' => 'giovanna', 'nome' => 'giovanna', 'cognome' => 'bianchi', 'genere' => 'F', 'data_nascita' => '1985-07-15', 'email' => 'giovanna@bianchi.it', 'telefono' => '3859827631', 'psw' => 'password', 'tipologia'=>'locatore'],
            ['username' => 'luca', 'nome' => 'luca', 'cognome' => 'verdi', 'genere' => 'M', 'data_nascita' => '1998-12-12', 'email' => 'luca@verdi.it', 'telefono' => '8945762408', 'psw' => 'password', 'tipologia'=>'locatario'],
            ['username' => 'noemi', 'nome' => 'noemi', 'cognome' => 'del verde', 'genere' => 'ND', 'data_nascita' => '2001-05-12', 'email' => 'noemi@delverde.it', 'telefono' => null, 'psw' => 'password', 'tipologia'=>'locatario']
        ]);

        DB::table('annuncio')->insert([
            ['username_locatore' => 'mario', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO, 'data_inserimento' => '2022-05-14', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Viale della Vittoria', 'numero_civico' => '23', 'piano' => 4, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 800.00, 'caparra' => 1600.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 20, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'giovanna', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO, 'data_inserimento' => '2022-06-24', 'disponibile' => false, 'provincia' => 'AN', 'citta' => 'ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Piazza Cavour', 'numero_civico' => '2', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 1000.00, 'caparra' => 2000.00, 'durata_minima_locazione' => 10, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-10-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'mario', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO, 'data_inserimento' => '2022-05-14', 'disponibile' => true, 'provincia' => 'PE', 'citta' => 'pescara', 'cap' => '12345', 'zona_di_localizzazione' => 'lungomare', 'indirizzo' => 'Via lungomare', 'numero_civico' => '14', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 6, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 300.00, 'caparra' => 600.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 22, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'giovanna', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO, 'data_inserimento' => '2022-06-24', 'disponibile' => true, 'provincia' => 'CH', 'citta' => 'chieti', 'cap' => '12345', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Via della Liberazione', 'numero_civico' => '134/A', 'piano' => 5, 'numero_posti_letto_totali_alloggio' => 3, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 250.00, 'caparra' => 250.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2025-08-31']
        ]);

        DB::table('opzione_annuncio')->insert([
            ['username_locatario' => 'luca', 'id_annuncio' => 1],
            ['username_locatario' => 'noemi', 'id_annuncio' => 4]
        ]);

        DB::table('appartamento')->insert([
            ['id_annuncio' => 1, 'numero_camere' => 4, 'dimensioni_appartamento' => 120, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => false, 'tipologia' => 'appartamento'],
            ['id_annuncio' => 2, 'numero_camere' => 4, 'dimensioni_appartamento' => 180, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia' => 'appartamento']
        ]);

        DB::table('posto_letto')->insert([
            ['id_annuncio' => 3, 'dimensioni_camera' => 15, 'letti_nella_camera' => 1, 'presenza_angolo_studio' => true, 'tipologia' => 'singola'],
            ['id_annuncio' => 4, 'dimensioni_camera' => 18, 'letti_nella_camera' => 2, 'presenza_angolo_studio' => false, 'tipologia' => 'condivisa']
        ]);

        DB::table('messaggio')->insert([
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 14:50:00', 'testo' => 'Salve sono interessato all\'annuncio sull\'appartamento', 'mittente' => 'locatario'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 14:55:00', 'testo' => 'Perfetto, è ancora disponibile', 'mittente' => 'locatore'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:04:32', 'testo' => 'Sarebbe possibile venire a vederlo?', 'mittente' => 'locatario'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:09:00', 'testo' => 'Certo, le va bene domattina?', 'mittente' => 'locatore'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:12:00', 'testo' => 'Sisi, facciamo alle 10?', 'mittente' => 'locatario'],
            ['username_locatore' => 'mario', 'username_locatario' => 'luca', 'data_invio' => '2022-05-17 15:15:34', 'testo' => 'Perfetto, a domattina', 'mittente' => 'locatore'],
            ['username_locatore' => 'giovanna', 'username_locatario' => 'noemi', 'data_invio' => '2022-05-22 18:09:00', 'testo' => 'Salve, sarei interessata all\'annuncio sulla camera singola, è possibile venire a vederla?', 'mittente' => 'locatario']
        ]);

        DB::table('faq')->insert([
            ['domanda' => 'Come posso inserire un annuncio sul sito?' , 'risposta' => 'Per inserire un annuncio bisogna essere loggati con un account da locatore, accedendo alla propria area personale basterà poi cliccare sul pulsante inserisci annuncio'],
            ['domanda' => 'Come faccio a contattare un locatore?', 'risposta' => 'Per contattare un locatore bisogna opzionare l\'annuncio al quale sei interessato, da lì verrai direttamente reindirizzato alla pagina di messagistica dove potrai parlare con il locatore che ha inserito l\'annuncio'],
            ['domanda' => 'Dove posso vedere tutti gli annunci che ho inserito?', 'risposta' => 'Tutti gli annunci da te inseriti sono all\'interno della tua area personale alla quale pui accedere dalla navbar dopo aver fatto il log-in']
        ]);
    }

}
