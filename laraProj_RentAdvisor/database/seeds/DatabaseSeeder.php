<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    const TITOLO_APPARTAMENTO = 'Appartamento in centro città con 4 stanze singole';
    const DESCRIZIONE_APPARTAMENTO = 'Affittasi intero appartamento in centro città, 3 singole vicono a tutto' ;
    const TITOLO_POSTO_LETTO = 'Posto letto vicino la facoltà di ingegneria';
    const DESCRIZIONE_POSTO_LETTO = 'Affittasi stanza singola in un\' appartamento appena ristrutturato vicino ingegneria';

    public function run() {


        DB::table('users')->insert([
            ['username' => 'adminadmin2', 'nome' => 'admin', 'cognome' => 'admin', 'genere' => 'ND', 'data_nascita' => '1900-01-01', 'email' => 'admin@admin.com', 'telefono' => null, 'password' => Hash::make('adminadmin'), 'role'=>'admin','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['username' => 'mariomario', 'nome' => 'mario', 'cognome' => 'rossi', 'genere' => 'M', 'data_nascita' => '1990-09-22', 'email' => 'mario@rossi.it', 'telefono' => '1234567890', 'password' => Hash::make('password'), 'role'=>'locatore','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['username' => 'giovannagiovanna', 'nome' => 'giovanna', 'cognome' => 'bianchi', 'genere' => 'F', 'data_nascita' => '1985-07-15', 'email' => 'giovanna@bianchi.it', 'telefono' => '3859827631', 'password' => Hash::make('password'), 'role'=>'locatore','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['username' => 'lucaluca', 'nome' => 'luca', 'cognome' => 'verdi', 'genere' => 'M', 'data_nascita' => '1998-12-12', 'email' => 'luca@verdi.it', 'telefono' => '8945762408', 'password' => Hash::make('password'), 'role'=>'locatario','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['username' => 'noeminoemi', 'nome' => 'noemi', 'cognome' => 'del verde', 'genere' => 'ND', 'data_nascita' => '2001-05-12', 'email' => 'noemi@delverde.it', 'telefono' => null, 'password' => Hash::make('password'), 'role'=>'locatario','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
			['username' => 'lorelore', 'nome' =>'Locatore', 'cognome' => 'Generico', 'genere' => 'ND', 'data_nascita' => '1990-01-01', 'email' => 'locatore@gmail.com', 'telefono' => null, 'password' => Hash::make('fYq8SAgv'), 'role' => 'locatore','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
			['username' => 'lariolario', 'nome' =>'Locatario', 'cognome' => 'Generico', 'genere' => 'ND', 'data_nascita' => '1995-01-01', 'email' => 'locatario@gmail.com', 'telefono' => null, 'password' => Hash::make('fYq8SAgv'), 'role' => 'locatario','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
			['username' => 'adminadmin', 'nome' =>'Admin', 'cognome' => 'Generico', 'genere' => 'ND', 'data_nascita' => '2000-01-01', 'email' => 'admin@gmail.com', 'telefono' => null, 'password' => Hash::make('fYq8SAgv'), 'role' => 'admin','created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]

        ]);

        DB::table('Annuncio')->insert([
            ['username_locatore' => 'mariomario', 'titolo' => 'Appartamento per studenti su Viale della Vittoria', 'descrizione' => 'Affittasi appartamento per 4 studenti situato su Viale della Vittoria. Appartamento composto da 4 camere singole, 2 bagni e cucina. Vicino a molti servizi come supermercato, farmacia, palestra e capolinea bus. Non sono accetti fumatori. Le utenze dell\'appartamento sono intestate a noi proprietari.','tipologia' => 'appartamento', 'data_inserimento' => '2021-05-17 13:00:00', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Viale della Vittoria', 'numero_civico' => '23', 'piano' => 4, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 800.00, 'caparra' => 1600.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 20, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'giovannagiovanna', 'titolo' => 'Appartamento in pieno centro ad ancona', 'descrizione' => 'Alloggio  per studenti in pieno centro ad Ancona, ideale sia per stuenti di economia che di ingegneria essendo vicino al capolinea degli autobus. L\'appartamento è composto da 2 camere singole e una doppia, 2 bagni, cucina e piccolo salottino. Completamente arredato e ristrutturato 3 anni fa. Affittasi solo a studenti referenziati','tipologia' => 'appartamento',  'data_inserimento' => '2021-06-01 12:50:00', 'disponibile' => false, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Piazza Cavour', 'numero_civico' => '2', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 1000.00, 'caparra' => 2000.00, 'durata_minima_locazione' => 10, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-10-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'mariomario', 'titolo' => 'Affittasi posto letto in camera singola', 'descrizione' => 'Posto letto in camera singola in appartamento con altri 5 studenti a pescara. La camera è abbastanza grande e diapone anche di un angolo studio. L\'appartamento ha due bagni e una grande cucina. È situato vicino a tutti i servizi e l\'università è raggiungibile anche a piedi.','tipologia' => 'posto_letto', 'data_inserimento' => '2021-05-14 14:50:00', 'disponibile' => true, 'provincia' => 'PE', 'citta' => 'Pescara', 'cap' => '12345', 'zona_di_localizzazione' => 'lungomare', 'indirizzo' => 'Via lungomare', 'numero_civico' => '14', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 6, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 300.00, 'caparra' => 600.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 22, 'eta_preferita_max' => 27, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'giovannagiovanna', 'titolo' => 'Posto letto in stanza doppia vicino la facoltà di medicina', 'descrizione' => 'Affittasi a studentessa posto letto in stanza doppia vicino la facoltà di medicina a Chieti, Nell\'appartamento ci sono già 2 studentesse ed è composto da una stanza singola, una stanza doppia, una cucina, un bagno copmleto e uno di servizio. L\'alloggio si trova vicino alla fermata del bus e ad un supermercato','tipologia' => 'posto_letto', 'data_inserimento' => '2021-06-24 14:50:00', 'disponibile' => true, 'provincia' => 'CH', 'citta' => 'Chieti', 'cap' => '66100', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Via della Liberazione', 'numero_civico' => '134/A', 'piano' => 5, 'numero_posti_letto_totali_alloggio' => 3, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 250.00, 'caparra' => 250.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2025-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => 'Posto letto vicino la facoltà di ingegneria', 'descrizione' => 'Affittasi stanza singola in un appartamento appena ristrutturato vicino la facoltà di ingegneria. Nell\'appartamento sono già presenti altri 4 studenti','tipologia' => 'posto_letto', 'data_inserimento' => '2021-03-10 14:50:00', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'le grazie', 'indirizzo' => 'Via delle Grazie', 'numero_civico' => '7', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 5, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => false, 'canone_affitto' => 180.00, 'caparra' => 250.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 21, 'eta_preferita_max' => 24, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2026-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => 'Appartamento ristrutturato in via dei Velini', 'descrizione' => 'Intero appartamento per 2 studenti. Zona tranquilla con supermercato a 2 minuti. Piano 1, con terrazzo superiore. Vietato rumori dopo le 00.00. ','tipologia' => 'appartamento',  'data_inserimento' => '2021-02-02 14:50:00', 'disponibile' => true, 'provincia' => 'MC', 'citta' => 'Macerata', 'cap' => '62100', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via dei Velini', 'numero_civico' => '15', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 2, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 250.00, 'caparra' => 200.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 18, 'eta_preferita_max' => 28, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2021-05-11 14:50:00', 'disponibile' => true, 'provincia' => 'FM', 'citta' => 'Fermo', 'cap' => '63900', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Galileo Galilei', 'numero_civico' => '12', 'piano' => 3, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 180.00, 'caparra' => 100.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 18, 'eta_preferita_max' => 30, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2030-08-31'],
			['username_locatore' => 'mariomario', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2021-03-11 14:50:00', 'disponibile' => false, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '62123', 'zona_di_localizzazione' => 'tavernelle', 'indirizzo' => 'Via delle Tavernelle', 'numero_civico' => '1', 'piano' => 4, 'numero_posti_letto_totali_alloggio' => 6, 'numero_bagni' => 2, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => false, 'canone_affitto' => 180.00, 'caparra' => 150.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 20, 'eta_preferita_max' => 21, 'periodo_disponibilita_inizio' => '2023-09-01', 'periodo_disponibilita_fine' => '2024-08-31'],
			['username_locatore' => 'giovannagiovanna', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2021-05-11 14:50:00', 'disponibile' => true, 'provincia' => 'PE', 'citta' => 'Pescara', 'cap' => '65121', 'zona_di_localizzazione' => 'lungomare', 'indirizzo' => 'Via lungomare', 'numero_civico' => '3', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 2, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 200.00, 'caparra' => 150.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'M', 'eta_preferita_min' => 21, 'eta_preferita_max' => 23, 'periodo_disponibilita_inizio' => '2022-11-01', 'periodo_disponibilita_fine' => '2027-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => self::TITOLO_APPARTAMENTO, 'descrizione' => self::DESCRIZIONE_APPARTAMENTO,'tipologia' => 'appartamento',  'data_inserimento' => '2021-04-20 14:50:00', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '62123', 'zona_di_localizzazione' => 'torrette', 'indirizzo' => 'Via Tronto', 'numero_civico' => '17', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 4, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => false, 'canone_affitto' => 250.00, 'caparra' => 250.00, 'durata_minima_locazione' => 6, 'genere_preferito' => 'ND', 'eta_preferita_min' => 18, 'eta_preferita_max' => 21, 'periodo_disponibilita_inizio' => '2022-12-01', 'periodo_disponibilita_fine' => null],
			['username_locatore' => 'mariomario', 'titolo' => self::TITOLO_POSTO_LETTO, 'descrizione' => self::DESCRIZIONE_POSTO_LETTO,'tipologia' => 'posto_letto', 'data_inserimento' => '2021-03-30 12:10:00', 'disponibile' => true, 'provincia' => 'CH', 'citta' => 'Chieti', 'cap' => '66100', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Colonnetta', 'numero_civico' => '10', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 5, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 100.00, 'caparra' => 80.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'F', 'eta_preferita_min' => 19, 'eta_preferita_max' => 21, 'periodo_disponibilita_inizio' => '2022-09-22', 'periodo_disponibilita_fine' => null],
			['username_locatore' => 'giovannagiovanna', 'titolo' => 'Appartamento per studenti', 'descrizione' => 'Affitto solo studenti. Tutto ristrutturato da 1 anno, cucina, bagni, e utensili nuovi. Necessario pagamento anticipato della caparra di 120€. ','tipologia' => 'appartamento',  'data_inserimento' => '2021-05-20 14:50:00', 'disponibile' => true, 'provincia' => 'FM', 'citta' => 'Fermo', 'cap' => '63900', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Galileo Galilei', 'numero_civico' => '14', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 3, 'numero_bagni' => 1, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => false, 'canone_affitto' => 180.00, 'caparra' => 120.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 22, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => '2025-08-31'],
			['username_locatore' => 'lorelore', 'titolo' => 'Affittasi posto letto in alloggio da 5 studenti', 'descrizione' => 'Stanza con posto letto disponibile. Alloggio con 2 bagni. Secondo piano con ascensore. ','tipologia' => 'posto_letto', 'data_inserimento' => '2021-05-30 14:30:00', 'disponibile' => true, 'provincia' => 'MC', 'citta' => 'Macerata', 'cap' => '62100', 'zona_di_localizzazione' => null, 'indirizzo' => 'Via Roma', 'numero_civico' => '3/A', 'piano' => 2, 'numero_posti_letto_totali_alloggio' => 5, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => true, 'wi_fi' => false, 'ascensore' => true, 'canone_affitto' => 100.00, 'caparra' => 150.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => 20, 'eta_preferita_max' => 25, 'periodo_disponibilita_inizio' => '2022-08-01', 'periodo_disponibilita_fine' => '2024-08-31'],
            ['username_locatore' => 'lorelore', 'titolo' => 'Appartamento piazza Cavour, Ancona', 'descrizione' => 'In Piazza Cavour, in posizione centralissima e pianeggiante, proponiamo in affitto grande appartamento di 150 mq, molto luminoso, posto al piano quarto con ascensore,composto come segue:ingresso, corridoio, sala da pranzo e cucina semi-abitabile, tre camere da letto matrimoniali, una camera da letto singola, due bagni. Un balcone.','tipologia' => 'appartamento', 'data_inserimento' => '2022-06-01 14:50:00', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '60123', 'zona_di_localizzazione' => 'centro', 'indirizzo' => 'Piazza Cavour', 'numero_civico' => '15', 'piano' => 4, 'numero_posti_letto_totali_alloggio' => 7, 'numero_bagni' => 2, 'fumatori' => true, 'parcheggio' => false, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 1000.00, 'caparra' => 2000.00, 'durata_minima_locazione' => 12, 'genere_preferito' => 'ND', 'eta_preferita_min' => null, 'eta_preferita_max' => null, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null],
            ['username_locatore' => 'lorelore', 'titolo' => 'Singola dal 1 luglio - P.zza Ugo Bassi', 'descrizione' => 'Ampia stanza singola in grazioso appartamento completamente arredato. L\'appartamento è composto da sala e cucina abitabile con divano e affaccio sul balcone, 1 bagno e 2 camere da letto. L\'appartamento è attrezzato con tutto il necessario, utenze allacciate e riscaldamento autonomo. Una delle due stanze è attualmente occupata da un lavoratore. L\'appartamento è situato in zona strategica, riservata ma servitissima nelle immediate vicinanze di tutti i servizi: supermercati alimentari (Eurospin, Coop e Conad), macelleria, fruttivendolo, lavanderia, gelateria, bar, ristoranti e pizzerie, kebap, calzolaio, oreficeria, negozi di abbigliamento ecc. L\'università, la stazione ferroviaria centrale, il centro città e il porto sono raggiungibili facilmente tramite autobus urbani (linea 2-3-1/3-1/4-1/5) in pochi minuti. Su richiesta, disponibilità di posto auto riservato, all\'interno del residence, prospiciente il portone di ingresso della palazzina.','tipologia' => 'posto_letto', 'data_inserimento' => '2022-05-27 14:50:00', 'disponibile' => true, 'provincia' => 'AN', 'citta' => 'Ancona', 'cap' => '60125', 'zona_di_localizzazione' => 'Ugo Bassi', 'indirizzo' => 'Piazza Ugo Bassi', 'numero_civico' => '34', 'piano' => 1, 'numero_posti_letto_totali_alloggio' => 2, 'numero_bagni' => 1, 'fumatori' => false, 'parcheggio' => true, 'wi_fi' => true, 'ascensore' => true, 'canone_affitto' => 240.00, 'caparra' => 240.00, 'durata_minima_locazione' => 10, 'genere_preferito' => 'M', 'eta_preferita_min' => null, 'eta_preferita_max' => null, 'periodo_disponibilita_inizio' => '2022-09-01', 'periodo_disponibilita_fine' => null]


        ]);

        DB::table('Opzione_Annuncio')->insert([
            ['username_locatario' => 'lucaluca', 'id_annuncio' => 1, 'data_opzione' => '2022-01-11 14:50:00'],
            ['username_locatario' => 'noeminoemi', 'id_annuncio' => 4, 'data_opzione' => '2022-02-13 14:50:00'],
			['username_locatario' => 'lariolario', 'id_annuncio' => 5, 'data_opzione' => '2022-04-14 15:50:00'],
			['username_locatario' => 'lariolario', 'id_annuncio' => 1, 'data_opzione' => '2022-05-15 13:22:00'],
			['username_locatario' => 'lucaluca', 'id_annuncio' => 10, 'data_opzione' => '2022-03-16 16:56:00'],
			['username_locatario' => 'noeminoemi', 'id_annuncio' =>13, 'data_opzione' => '2022-02-17 14:23:00'],
			['username_locatario' => 'lariolario', 'id_annuncio' => 11, 'data_opzione' => '2022-01-18 07:50:00']
        ]);

        DB::table('Appartamento')->insert([
            ['id_annuncio' => 1, 'numero_camere' => 4, 'dimensioni_appartamento' => 120, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => false, 'tipologia_appartamento' => 'appartamento'],
            ['id_annuncio' => 2, 'numero_camere' => 4, 'dimensioni_appartamento' => 180, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 6, 'numero_camere' => 2, 'dimensioni_appartamento' => 90, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => false, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 9, 'numero_camere' => 2, 'dimensioni_appartamento' => 100, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 10, 'numero_camere' => 4, 'dimensioni_appartamento' => 120, 'presenza_cucina' => true, 'presenza_locale_ricreativo' => true, 'tipologia_appartamento' => 'appartamento'],
			['id_annuncio' => 12, 'numero_camere' => 3, 'dimensioni_appartamento' => 90, 'presenza_cucina' => false, 'presenza_locale_ricreativo' =>false, 'tipologia_appartamento' => 'appartamento'],
            ['id_annuncio' => 14, 'numero_camere' => 6, 'dimensioni_appartamento' => 150, 'presenza_cucina' => true, 'presenza_locale_ricreativo' =>true, 'tipologia_appartamento' => 'appartamento']

        ]);

        DB::table('Posto_Letto')->insert([
            ['id_annuncio' => 3, 'dimensioni_camera' => 15, 'letti_nella_camera' => 1, 'presenza_angolo_studio' => true, 'tipologia_posto_letto' => 'singola'],
            ['id_annuncio' => 4, 'dimensioni_camera' => 18, 'letti_nella_camera' => 2, 'presenza_angolo_studio' => false, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 5, 'dimensioni_camera' => 18, 'letti_nella_camera' => 1, 'presenza_angolo_studio' => true, 'tipologia_posto_letto' => 'singola'],
			['id_annuncio' => 7, 'dimensioni_camera' => 20, 'letti_nella_camera' => 2, 'presenza_angolo_studio' => false, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 8, 'dimensioni_camera' => 18, 'letti_nella_camera' => 2, 'presenza_angolo_studio' =>false, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 11, 'dimensioni_camera' => 30, 'letti_nella_camera' => 2, 'presenza_angolo_studio' =>true, 'tipologia_posto_letto' => 'condivisa'],
			['id_annuncio' => 13, 'dimensioni_camera' => 30, 'letti_nella_camera' => 2, 'presenza_angolo_studio' =>false, 'tipologia_posto_letto' => 'condivisa'],
            ['id_annuncio' => 15, 'dimensioni_camera' => 17, 'letti_nella_camera' => 1, 'presenza_angolo_studio' =>true, 'tipologia_posto_letto' => 'singola']

        ]);

        DB::table('Messaggio')->insert([
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-05-17 14:50:00', 'testo' => 'Salve sono interessato all\'annuncio sull\'appartamento', 'mittente' => 'locatario'],
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-05-17 14:55:00', 'testo' => 'Perfetto, è ancora disponibile', 'mittente' => 'locatore'],
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-05-17 15:04:32', 'testo' => 'Sarebbe possibile venire a vederlo?', 'mittente' => 'locatario'],
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-05-17 15:09:00', 'testo' => 'Certo, le va bene domattina?', 'mittente' => 'locatore'],
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-05-17 15:12:00', 'testo' => 'Sisi, facciamo alle 10?', 'mittente' => 'locatario'],
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-05-17 15:15:34', 'testo' => 'Perfetto, a domattina', 'mittente' => 'locatore'],
            ['username_locatore' => 'giovannagiovanna', 'username_locatario' => 'noeminoemi', 'data_invio' => '2022-05-22 18:09:00', 'testo' => 'Salve, sarei interessata all\'annuncio sulla camera singola, è possibile venire a vederla?', 'mittente' => 'locatario'],
			['username_locatore' => 'lorelore', 'username_locatario' => 'lariolario', 'data_invio' => '2022-06-06 15:00:00', 'testo' => 'Salve, sarei interessato all\'annuncio sulla camera singola.', 'mittente' => 'locatario'],
			['username_locatore' => 'giovannagiovanna', 'username_locatario' => 'lariolario', 'data_invio' => '2022-06-07 14:00:00', 'testo' => 'Salve, sarei interessato all\'annuncio sull\'appartamento.', 'mittente' => 'locatario'],
			['username_locatore' => 'lorelore', 'username_locatario' => 'lucaluca', 'data_invio' => '2022-06-06 15:01:59', 'testo' => 'Salve, sarei interessato all\'annuncio sull\'appartamento.', 'mittente' => 'locatario'],
			['username_locatore' => 'lorelore', 'username_locatario' => 'noeminoemi', 'data_invio' => '2022-06-06 17:00:00', 'testo' => 'Salve, sarei interessato all\'annuncio sul posto letto.', 'mittente' => 'locatario'],
			['username_locatore' => 'mariomario', 'username_locatario' => 'lariolario', 'data_invio' => '2022-06-07 20:02:31', 'testo' => 'Salve, sarei interessato all\'annuncio sulla camera condivisa.', 'mittente' => 'locatario'],
		]);

        DB::table('FAQ')->insert([
            ['domanda' => 'Come posso inserire un annuncio sul sito?' , 'risposta' => 'Per inserire un annuncio bisogna essere loggati con un account da locatore, accedendo alla propria area personale basterà poi cliccare sul pulsante inserisci annuncio'],
            ['domanda' => 'Come faccio a contattare un locatore?', 'risposta' => 'Per contattare un locatore bisogna opzionare l\'annuncio al quale sei interessato, da lì verrai direttamente reindirizzato alla pagina di messagistica dove potrai parlare con il locatore che ha inserito l\'annuncio'],
            ['domanda' => 'Dove posso vedere tutti gli annunci che ho inserito?', 'risposta' => 'Tutti gli annunci da te inseriti sono all\'interno della tua area personale alla quale pui accedere dalla navbar dopo aver fatto il log-in']
        ]);

        DB::table('Immagine')->insert([
            ['id_annuncio' => 1, 'nome_immagine' => '1_0.jpg'],
            ['id_annuncio' => 1, 'nome_immagine' => '1_1.jpg'],
            ['id_annuncio' => 1, 'nome_immagine' => '1_2.jpg'],
            ['id_annuncio' => 2, 'nome_immagine' => '2_0.jpg'],
            ['id_annuncio' => 2, 'nome_immagine' => '2_1.jpg'],
            ['id_annuncio' => 2, 'nome_immagine' => '2_2.jpg'],
            ['id_annuncio' => 3, 'nome_immagine' => '3_0.jpg'],
            ['id_annuncio' => 3, 'nome_immagine' => '3_1.jpg'],
            ['id_annuncio' => 3, 'nome_immagine' => '3_2.jpg'],
            ['id_annuncio' => 4, 'nome_immagine' => '4_0.jpeg'],
            ['id_annuncio' => 5, 'nome_immagine' => '5_0.jpeg'],
            ['id_annuncio' => 6, 'nome_immagine' => '6_0.jpeg'],
            ['id_annuncio' => 7, 'nome_immagine' => '7_0.jpeg'],
            ['id_annuncio' => 8, 'nome_immagine' => 'image_not_avaiable.jpg'],
            ['id_annuncio' => 9, 'nome_immagine' => '9_0.jpeg'],
            ['id_annuncio' => 10, 'nome_immagine' => '10_0.jpeg'],
            ['id_annuncio' => 10, 'nome_immagine' => '10_1.jpeg'],
            ['id_annuncio' => 11, 'nome_immagine' => '11_0.jpeg'],
            ['id_annuncio' => 12, 'nome_immagine' => 'image_not_avaiable.jpg'],
            ['id_annuncio' => 13, 'nome_immagine' => '13_0.jpeg'],
            ['id_annuncio' => 14, 'nome_immagine' => '14_0.jpeg'],
            ['id_annuncio' => 14, 'nome_immagine' => '14_1.jpeg'],
            ['id_annuncio' => 15, 'nome_immagine' => '15_0.jpg'],
        ]);

        DB::table('Contratto')->insert([
            ['username_locatore' => 'lorelore', 'username_locatario' => 'lariolario', 'id_annuncio' => 5, 'data_inizio' => '2022-09-02', 'data_fine' => '2023-09-15'],
            ['username_locatore' => 'giovannagiovanna', 'username_locatario' => 'noeminoemi', 'id_annuncio' => 4, 'data_inizio' => '2022-09-25', 'data_fine' => '2023-02-12'],
            ['username_locatore' => 'mariomario', 'username_locatario' => 'lucaluca', 'id_annuncio' => 1, 'data_inizio' => '2022-09-30', 'data_fine' => '2023-02-12']
        ]);

    }

}
