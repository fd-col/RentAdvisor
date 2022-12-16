@extends('layouts.layout')

@section('title', 'Modifica Annuncio')

<!-- CONTENT -->
@section('content')

    <script src="{{ asset('js/funzioni.js') }}" ></script>
    <script>
        //funzione validazione dei campi live
        $(function () {
            var actionUrl = "{{ route('conferma_modifica_annuncio') }}";
            var formId = 'modifica_annuncio';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#modifica_annuncio").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });

        //Script per controllare le dimensioni e l'estensione delle immagini
        jQuery(document).ready(function($) {
            $('form input[type=file]').each(function(){
                $(this).change(function(evt){
                    var input = $(this);
                    var file = input.prop('files')[0];
                    if( file && file.size < 2 * 1048576 && (file.type == "image/png" || file.type == "image/jpg" || file.type == "image/jpeg") ) { // 2 MB (this size is in bytes)
                    }else{
                        alert( 'File non ammesso - Tipo: ' + file.type + '; Dimensioni: ' + file.size  + '\nFile troppo grande o tipo di file non accettato');
                        input.replaceWith( input.val('').clone(true) );
                        evt.preventDefault();
                    }
                })
            });
        });
    </script>
    @isset($annuncio)
    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-bottom">
                            <div class="aa-title">
                                <h2>Modifica il tuo annuncio</h2>
                                <span></span>
                                <p>I campi obbligatori sono marcati con <strong class="required">*</strong></p>
                            </div>
                            <div class="aa-contact-form">
                                {{ Form::open(array('route' => 'conferma_modifica_annuncio', 'id' => 'modifica_annuncio', 'files' => true, 'class' => 'contactform')) }}
                                {{ csrf_field() }}
                                {{ Form::text('id', "$annuncio->id",['style' => 'display: none']) }}
                                <fieldset name="intestazione">
                                    <p class="comment-form-author">
                                    {{ Form::label('titolo', 'Titolo*', []) }}
                                    {{ Form::text('titolo', "$annuncio->titolo", ['id' => 'titolo', 'size' => '30', 'maxlength' => '200']) }}
                                    </p>
                                    <p class="comment-form-comment">
                                    {{ Form::label('descrizione', 'Descrizione*', []) }}
                                    {{ Form::textarea('descrizione', "$annuncio->descrizione", ['id' => 'descrizione', 'cols' => '45', 'rows' => '8', 'maxlength' => '1000']) }}
                                    </p>
                                </fieldset>

                                <fieldset name="tipologia_generale">
                                    <legend>TIPOLOGIA DELL'ALLOGGIO<span class="required">*</span></legend>

                                    <p class="comment-form-author">
                                    {{ Form::label('tipologia', 'Appartamento/Posto letto (non modificabile)', []) }}
                                    {{ Form::text('tipologia', "$annuncio->tipologia", ['id' => 'tipologia', 'readonly' => 'true']) }}
                                    </p>
                                </fieldset>

                                <fieldset name="indirizzo">
                                    <legend>INDIRIZZO DELL'ALLOGGIO</legend>

                                    <p class="comment-form-author">
                                    {{ Form::label('provincia', 'Provincia*', []) }}
                                    {{ Form::text('provincia', "$annuncio->provincia", ['id' => 'provincia', 'size' => '30', 'maxlength' => '2']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('citta', 'Città*', []) }}
                                        {{ Form::text('citta', "$annuncio->citta", ['id' => 'citta', 'size' => '30', 'maxlength' => '50']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('cap', 'CAP*', []) }}
                                        {{ Form::text('cap', "$annuncio->cap", ['id' => 'cap', 'size' => '30', 'maxlength' => '5']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('zona_di_localizzazione', 'Zona di localizzazione', []) }}
                                        {{ Form::text('zona_di_localizzazione', "$annuncio->zona_di_localizzazione", ['id' => 'zona_di_localizzazione', 'size' => '30', 'maxlength' => '50']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('indirizzo', 'Indirizzo*', []) }}
                                        {{ Form::text('indirizzo', "$annuncio->indirizzo", ['id' => 'indirizzo', 'size' => '30', 'maxlength' => '100']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('numero_civico', 'Numero civico*', []) }}
                                        {{ Form::text('numero_civico', "$annuncio->numero_civico", ['id' => 'numero_civico', 'size' => '30', 'maxlength' => '6']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('piano', 'Piano*', []) }}
                                        {{ Form::number('piano', "$annuncio->piano", ['id' => 'piano', 'min' => '0', 'max' => '99']) }}
                                    </p>
                                </fieldset>

                                <fieldset name="caratteristiche_alloggio">
                                    <legend>CARATTERISTICHE DELL'ALLOGGIO</legend>

                                    <p class="comment-form-author">
                                    {{ Form::label('numero_posti_letto_totali_alloggio', 'Posti letto totali nell\'alloggio*', []) }}
                                    {{ Form::number('numero_posti_letto_totali_alloggio', "$annuncio->numero_posti_letto_totali_alloggio", ['id' => 'numero_posti_letto_totali_alloggio', 'min' => '1', 'max' => '15']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('numero_bagni', 'Bagni presenti nell\'alloggio*', []) }}
                                        {{ Form::number('numero_bagni', "$annuncio->numero_bagni", ['id' => 'numero_bagni', 'min' => '1', 'max' => '100']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('fumatori', 'I fumatori sono accetti nell\'alloggio*', []) }}
                                        {{ Form::select('fumatori', ['0' => 'No', '1' => 'Si'], "$annuncio->fumatori" , ['id' => 'fumatori']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('parcheggio', 'È presente un parcheggio dedicato ai risedenti nell\'alloggio*', []) }}
                                        {{ Form::select('parcheggio', ['0' => 'No', '1' => 'Si'], "$annuncio->parcheggio" , ['id' => 'parcheggio']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('wi_fi', 'È presente una connessione internet preinstallata*', []) }}
                                        {{ Form::select('wi_fi', ['0' => 'No', '1' => 'Si'], "$annuncio->wi_fi", ['id' => 'wi_fi']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('ascensore', 'È presente un ascensore*', []) }}
                                        {{ Form::select('ascensore', ['0' => 'No', '1' => 'Si'], "$annuncio->ascensore" , ['id' => 'ascensore']) }}
                                    </p>
                                </fieldset>

                                @isset($caratteristiche)
                                    @if($annuncio->tipologia == 'appartamento')
                                        <!-- Caratteristiche SOLO dell'APPARTAMENTO -->
                                        <fieldset id="tipologia_appartamento_fieldset">
                                            <legend>TIPOLOGIA APPARTAMENTO<span class="required">*</span></legend>
                                            <p class="comment-form-author">
                                            {{ Form::label('tipologia_appartamento', 'Appartamento/Casa indipendente*', []) }}
                                            {{ Form::select('tipologia_appartamento', ['appartamento' => 'Appartamento', 'casa_indipendente' => 'Casa indipendente'], "$caratteristiche->tipologia_appartamento", ['id' => 'tipologia_appartamento']) }}
                                            </p>
                                        </fieldset>

                                        <fieldset id="caratteristiche_appartamento_fieldset">
                                            <legend>CARATTERISTICHE DELL'APPARTAMENTO</legend>
                                            <p class="comment-form-author">
                                            {{ Form::label('numero_camere', 'Numero camere presenti nell\'appartamento', []) }}
                                            {{ Form::number('numero_camere', "$caratteristiche->numero_camere", ['id' => 'numero_camere', 'min' => '1', 'max' => '100']) }}
                                            </p>
                                            <p class="comment-form-author">
                                                {{ Form::label('dimensioni_appartamento', 'Dimensioni dell\'appartamento (Metri quadri)', []) }}
                                                {{ Form::number('dimensioni_appartamento', "$caratteristiche->dimensioni_appartamento", ['id' => 'dimensioni_appartamento', 'min' => '1', 'max' => '1000']) }}
                                            </p>
                                            <p class="comment-form-author">
                                                {{ Form::label('presenza_cucina', 'È presente una cucina*', []) }}
                                                {{ Form::select('presenza_cucina', ['0' => 'No', '1' => 'Si'], "$caratteristiche->presenza_cucina",['id' => 'presenza_cucina']) }}
                                            </p>
                                            <p class="comment-form-author">
                                                {{ Form::label('presenza_locale_ricreativo', 'È presente una sala/locale ricreativo*', []) }}
                                                {{ Form::select('presenza_locale_ricreativo', ['0' => 'No', '1' => 'Si'], "$caratteristiche->presenza_locale_ricreativo", ['id' => 'presenza_locale_ricreativo']) }}
                                            </p>
                                        </fieldset>
                                    @elseif($annuncio->tipologia == 'posto_letto')
                                        <!-- Caratteristiche SOLO del POSTO LETTO -->
                                        <fieldset id="tipologia_posto_letto_fieldset">
                                            <legend>TIPOLOGIA POSTO LETTO<span class="required">*</span></legend>
                                            <p class="comment-form-author">
                                            {{ Form::label('tipologia_posto_letto', 'Camera singola/condivisa*', []) }}
                                            {{ Form::select('tipologia_posto_letto', ['singola' => 'Camera singola', 'condivisa' => 'Camera condivisa'], "$caratteristiche->tipologia_posto_letto", ['id' => 'tipologia_posto_letto']) }}
                                            </p>
                                        </fieldset>

                                        <fieldset id="caratteristiche_posto_letto_fieldset">
                                            <legend>CARATTERISTICHE CAMERA</legend>
                                            <p class="comment-form-author">
                                            {{ Form::label('dimensioni_camera', 'Dimensioni della camera (Metri quadri)', []) }}
                                            {{ Form::number('dimensioni_camera', "$caratteristiche->dimensioni_camera", ['id' => 'dimensioni_camera', 'min' => '1', 'max' => '100']) }}
                                            </p>
                                            <p class="comment-form-author">
                                                {{ Form::label('letti_nella_camera', 'Numero di letti presenti nella camera', []) }}
                                                {{ Form::number('letti_nella_camera', "$caratteristiche->letti_nella_camera", ['id' => 'letti_nella_camera', 'min' => '1', 'max' => '100']) }}
                                            </p>
                                            <p class="comment-form-author">
                                                {{ Form::label('presenza_angolo_studio', 'È presente un angolo studio nella camera*', []) }}
                                                {{ Form::select('presenza_angolo_studio', ['0' => 'No', '1' => 'Si'], "$caratteristiche->presenza_angolo_studio",['id' => 'presenza_angolo_studio']) }}
                                            </p>
                                        </fieldset>
                                    @endif
                                @endisset


                                <fieldset name="condizioni_affitto">
                                    <legend>CONDIZIONI PER L'AFFITTO</legend>
                                    <p class="comment-form-author">
                                    {{ Form::label('canone_affitto', 'Canone di affitto mensile (€)*', []) }}
                                    {{ Form::number('canone_affitto', "$annuncio->canone_affitto", ['id' => 'canone_affitto', 'min' => '1', 'max' => '9999', 'step' => '0.01']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('caparra', 'Caparra (€)*', []) }}
                                        {{ Form::number('caparra', "$annuncio->caparra", ['id' => 'caparra', 'min' => '1', 'max' => '9999', 'step' => '0.01']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('durata_minima_locazione', 'Durata minima dell\'affitto (mesi)*', []) }}
                                        {{ Form::number('durata_minima_locazione', "$annuncio->durata_minima_locazione", ['id' => 'durata_minima_locazione', 'min' => '1', 'max' => '500']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('genere_preferito', 'Genere preferito degli affittuari*', []) }}
                                        {{ Form::select('genere_preferito', ['seleziona' => 'Seleziona', 'ND' => 'Indifferente', 'M' => 'M', 'F' => 'F'], "$annuncio->genere_preferito", ['id' => 'genere_preferito']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('eta_preferita_min', 'Minima età preferita degli affittuari (lasciare il campo vuoto se è indifferente)', []) }}
                                        {{ Form::number('eta_preferita_min', "$annuncio->eta_preferita_min", ['id' => 'eta_preferita_min', 'min' => '18', 'max' => '100']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('eta_preferita_max', 'Massima età preferita degli affittuari (lasciare il campo vuoto se è indifferente)', []) }}
                                        {{ Form::number('eta_preferita_max', "$annuncio->eta_preferita_max", ['id' => 'eta_preferita_max', 'min' => '18', 'max' => '100']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('periodo_disponibilita_inizio', 'L\'alloggio è disponibile dal:*', []) }}
                                        {{ Form::date('periodo_disponibilita_inizio',"$annuncio->periodo_disponibilita_inizio",['id' => 'periodo_disponibilita_inizio']) }}
                                    </p>
                                    <p class="comment-form-author">
                                        {{ Form::label('periodo_disponibilita_fine', 'L\'alloggio è disponibile fino al:', []) }}
                                        {{ Form::date('periodo_disponibilita_fine', "$annuncio->periodo_disponibilita_fine",['id' => 'periodo_disponibilita_fine']) }}
                                    </p>
                                </fieldset>

                                <fieldset name="foto">
                                    <legend>FOTO DELL'ALLOGGIO</legend>
                                    <p class="comment-form-author">
                                    {{ Form::label('foto_annuncio[]', "Inserisci le foto del tuo annuncio ATTENZIONE: alla modifica dell'annuncio le vecchie foto verranno eliminate", []) }}
                                    {{ Form::file('foto_annuncio[]', ['class' => 'input', 'id' => 'foto_annuncio[]', 'multiple' => 'true', 'accept' => 'image/jpeg, image/jpg, image/png']) }}
                                    </p>
                                </fieldset>
                                <p class="form-submit">
                                    {{ Form::submit('Modifica annuncio', ['class' => 'aa-browse-btn']) }}
                                </p>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endisset
@endsection
