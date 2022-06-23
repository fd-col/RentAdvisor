<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('/', 'CatalogoController@home') //pagina della home +
    ->name('home');

Route::get('/catalogo', 'CatalogoController@catalogo_senza_filtri') //pagina del catalogo +
    ->name('catalog');

Route::get('/faq', 'FaqController@pagina_faq') //pagina delle faq +
    ->name('faq');

Route::view('/contatti', 'views_html/contatti') //pagina dei contatti +
    ->name('contact');

Route::get('/dettagliannuncio/{id_annuncio}', 'CatalogoController@dettagli_annuncio') //dettaglio dell'annuncio con id corrispondente +
        ->name('dettagli_annuncio');


// link locatore (proprietario)

Route::get('/locatore/area_personale_locatore', 'ProfiloController@pagina_profilo_locatore') //pagina area personale (locatore) +
        ->name('area_personale_locatore')->middleware('can:isLocatore'); //attivazione del middleware authorize nella rotta (tramite la chiave can) 

Route::post('/locatore/modifica_dati_locatore', 'ProfiloController@modifica_dati_locatore') //rotta per la modifica dei dati del locatore +
    ->name('modifica_dati_locatore')->middleware('can:isLocatore');

Route::view('/locatore/inserisci_annuncio', 'views_html/inserisci_annuncio') //pagina di inserimento annuncio +
    ->name('inserisci_annuncio')->middleware('can:isLocatore');

Route::post('/locatore/conferma_inserimento', 'CatalogoController@inserisci_annuncio') //rotta con metodo post per l'inserimento dati annuncio +
    ->name('conferma_inserimento_annuncio')->middleware('can:isLocatore');

Route::post('/locatore/conferma_elimina_annuncio', 'CatalogoController@elimina_annuncio')  //rotta che elimina un annuncio +
    ->name('conferma_elimina_annuncio')->middleware('can:isLocatore');

Route::get('/locatore/modifica_annuncio/{id_annuncio}', 'CatalogoController@pagina_modifica_annuncio') //rotta che porta alla pag. modifica un annuncio +
    ->name('modifica_annuncio')->middleware('can:isLocatore');

Route::post('/locatore/conferma_modifica_annuncio', 'CatalogoController@modifica_annuncio')// rotta di conferma modifica annuncio +
    ->name('conferma_modifica_annuncio')->middleware('can:isLocatore');

Route::get('/locatore/modifica_disponibile/{id_annuncio}', 'CatalogoController@toggle_disponibile_annuncio')//rotta per togliere/aggiungere la disponibilità
    ->name('toggle_disponibile_annuncio')->middleware('can:isLocatore');

Route::view('/locatore/messaggi', 'views_html/messaggi')//non serve 
    ->name('messaggi')->middleware('can:isLocatore');

Route::get('/locatore/messaggi', 'MessaggiController@mostra_messaggi_chat') // (da rivedere)
    ->name('chat_locatore')->middleware('can:isLocatore');

Route::post('/locatore/messaggi', 'MessaggiController@mostra_messaggi_chat') //non serve 
    ->name('chat_locatore')->middleware('can:isLocatore');

Route::post('/locatore/chat', 'MessaggiController@mostra_chat_locatore')//apre la chat con un determinato utente, richiamata dalla chat nella pagina messaggi
	->name('mostra_chat_locatore')->middleware('can:isLocatore');

Route::post('/locatore/inserisci_contratto', 'ContrattoController@inserisci_contratto')//(come fa a implementare la form di inserimento? Gli input vengono inseriti nella request?)
    ->name('inserisci_contratto')->middleware('can:isLocatore');

// link locatario (studente)

Route::get('/locatario/visualizza_profilo_locatario', 'ProfiloController@pagina_profilo_locatario')
        ->name('visualizza_profilo_locatario')->middleware('can:isLocatario');

Route::post('/catalogo', 'CatalogoController@catalogo_con_filtri')
		->name('catalog_filtered')->middleware('can:isLocatario');

Route::post('/locatario/modifica_dati_locatario', 'ProfiloController@modifica_dati_locatario')
    ->name('modifica_dati_locatario')->middleware('can:isLocatario');

Route::get('/locatario/toggle_opzione_annuncio/{id_annuncio}', 'CatalogoController@toggle_opzione_annuncio')
    ->name('toggle_opzione_annuncio')->middleware('can:isLocatario');

Route::post('/locatario/chat', 'MessaggiController@mostra_chat_locatario')
		->name('mostra_chat_locatario')->middleware('can:isLocatario');

Route::get('/locatario/messaggi', 'MessaggiController@mostra_messaggi_chat')
		->name('chat_locatario')->middleware('can:isLocatario');

Route::get('/chat/opzione/{user}', 'MessaggiController@mostra_messaggi_chat_opzione') //rotta che viene richiamata dal "contatta il locatore" per il locatario
		->name('chat_opzione')->middleware('can:isUtente');                           //viene richiamata anche dal locatore in area personale -> dettagli annuncio -> opzioni

// link amministratore

Route::get('/admin/statistiche', 'StatisticheController@pagina_statistiche')
    ->name('statistiche')->middleware('can:isAdmin');

Route::post('/statistiche', 'StatisticheController@pagina_statistiche')
    ->name('statistiche_calcolate')->middleware('can:isAdmin');

Route::get('/faq/modifica/{id_faq}', 'FaqController@pagina_modifica_faq')
    ->name('modifica_faq')->middleware('can:isAdmin');

Route::post('faq/conferma_modifica_faq', 'FaqController@modifica_faq')
    ->name('conferma_modifica_faq')->middleware('can:isAdmin');

Route::view('/faq/aggiungi', 'views_html/aggiungi_faq')
    ->name('aggiungi_faq')->middleware('can:isAdmin');

Route::post('faq/conferma_aggiunta_faq', 'FaqController@aggiungi_faq')
    ->name('conferma_aggiunta_faq')->middleware('can:isAdmin');

Route::get('/faq/elimina/{id_faq}', 'FaqController@pagina_elimina_faq')
    ->name('elimina_faq')->middleware('can:isAdmin');

Route::post('faq/conferma_eliminazione_faq', 'FaqController@elimina_faq')
    ->name('conferma_elimina_faq')->middleware('can:isAdmin');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register');

//Rotte per i messaggi
Route::post('send_messagge', 'MessaggiController@invia_messaggio')
		->name('send')->middleware('can:isUtente');
// Rotte inserite dal comando artisan "ui vue --auth"
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
