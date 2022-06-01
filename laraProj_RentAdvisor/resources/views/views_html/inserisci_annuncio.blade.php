@extends('layouts.layout')

@section('title', 'Inserisci Annuncio')

<!-- CONTENT -->
@section('content')

    <script src="{{ asset('js/funzioni.js') }}" ></script>
    <!-- Script per modificare la form in base al tipo di alloggio-->
    <script>
        //funzione validazione dei campi live
        $(function () {
            var actionUrl = "{{ route('conferma_inserimento_annuncio') }}";
            var formId = 'inserisci_annuncio';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#inserisci_annuncio").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });

        jQuery(function(){
            $('#tipologia').change(function(){
                $val= $('select[name="tipologia"]').val();
                switch($val) {
                    case 'appartamento':
                        $('#tipologia_appartamento_fieldset').show('slow');
                        $('#caratteristiche_appartamento_fieldset').show('slow');
                        $('#tipologia_posto_letto_fieldset').hide('slow');
                        $('#caratteristiche_posto_letto_fieldset').hide('slow');
                        break;
                    case 'posto_letto':
                        $('#tipologia_appartamento_fieldset').hide('slow');
                        $('#caratteristiche_appartamento_fieldset').hide('slow');
                        $('#tipologia_posto_letto_fieldset').show('slow');
                        $('#caratteristiche_posto_letto_fieldset').show('slow');
                        break;
                    default:
                        $('#tipologia_appartamento_fieldset').hide('slow');
                        $('#caratteristiche_appartamento_fieldset').hide('slow');
                        $('#tipologia_posto_letto_fieldset').hide('slow');
                        $('#caratteristiche_posto_letto_fieldset').hide('slow');

                }
            });
        })

        //  Script per modificare la form in base al tipo di alloggio anche al ricaricamento della pagina in caso di errore
        $(document).ready(function(){
            $val= $('select[name="tipologia"]').val();
            switch($val) {
                case 'appartamento':
                    $('#tipologia_appartamento_fieldset').show();
                    $('#caratteristiche_appartamento_fieldset').show();
                    $('#tipologia_posto_letto_fieldset').hide();
                    $('#caratteristiche_posto_letto_fieldset').hide();
                    break;
                case 'posto_letto':
                    $('#tipologia_appartamento_fieldset').hide();
                    $('#caratteristiche_appartamento_fieldset').hide();
                    $('#tipologia_posto_letto_fieldset').show();
                    $('#caratteristiche_posto_letto_fieldset').show();
                    break;
                default:
                    $('#tipologia_appartamento_fieldset').hide();
                    $('#caratteristiche_appartamento_fieldset').hide();
                    $('#tipologia_posto_letto_fieldset').hide();
                    $('#caratteristiche_posto_letto_fieldset').hide();

            }
        })

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

    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-bottom">
                            <div class="aa-title">
                                <h2>Inserisci il tuo annuncio</h2>
                                <span></span>
                                <p>I campi obbligatori sono marcati con <strong class="required">*</strong></p>
                            </div>
                            <div class="aa-contact-form">
                                {{ Form::open(array('route' => 'conferma_inserimento_annuncio', 'id' => 'inserisci_annuncio', 'files' => true, 'class' => 'contactform')) }}
                                {{ csrf_field() }}
                                    <fieldset name="intestazione">
                                        <p class="comment-form-author">
                                            {{ Form::label('titolo', 'Titolo*', []) }}
                                            {{ Form::text('titolo', '', ['id' => 'titolo', 'size' => '30', 'maxlength' => '200']) }}
                                        </p>
                                        <p class="comment-form-comment">
                                            {{ Form::label('descrizione', 'Descrizione*', []) }}
                                            {{ Form::textarea('descrizione', '', ['id' => 'descrizione', 'cols' => '45', 'rows' => '8', 'maxlength' => '1000']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset name="tipologia_generale">
                                        <legend>TIPOLOGIA DELL'ALLOGGIO*</legend>

                                        <p class="comment-form-author">
                                            {{ Form::label('tipologia', 'Appartamento/Posto letto*', []) }}
                                            {{ Form::select('tipologia', ['seleziona' => 'Seleziona', 'appartamento' => 'Appartamento', 'posto_letto' => 'Posto letto'], ['id' => 'tipologia', 'name' => 'tipologia']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset name="indirizzo">
                                        <legend>INDIRIZZO DELL'ALLOGGIO</legend>

                                        <p class="comment-form-author">
                                            {{ Form::label('provincia', 'Provincia*', []) }}
                                            {{ Form::text('provincia', '', ['id' => 'provincia', 'size' => '30', 'maxlength' => '2']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('citta', 'Città*', []) }}
                                            {{ Form::text('citta', '', ['id' => 'citta', 'size' => '30', 'maxlength' => '50']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('cap', 'CAP*', []) }}
                                            {{ Form::text('cap', '', ['id' => 'cap', 'size' => '30', 'maxlength' => '5']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('zona_di_localizzazione', 'Zona di localizzazione', []) }}
                                            {{ Form::text('zona_di_localizzazione', '', ['id' => 'zona_di_localizzazione', 'size' => '30', 'maxlength' => '50']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('indirizzo', 'Indirizzo*', []) }}
                                            {{ Form::text('indirizzo', '', ['id' => 'indirizzo', 'size' => '30', 'maxlength' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('numero_civico', 'Numero civico*', []) }}
                                            {{ Form::text('numero_civico', '', ['id' => 'numero_civico', 'size' => '30', 'maxlength' => '6']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('piano', 'Piano*', []) }}
                                            {{ Form::number('piano', '', ['id' => 'piano', 'min' => '0', 'max' => '99']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset name="caratteristiche_alloggio">
                                        <legend>CARATTERISTICHE DELL'ALLOGGIO</legend>

                                        <p class="comment-form-author">
                                            {{ Form::label('numero_posti_letto_totali_alloggio', 'Posti letto totali nell\'alloggio*', []) }}
                                            {{ Form::number('numero_posti_letto_totali_alloggio', '', ['id' => 'numero_posti_letto_totali_alloggio', 'min' => '1', 'max' => '15']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('numero_bagni', 'Bagni presenti nell\'alloggio*', []) }}
                                            {{ Form::number('numero_bagni', '', ['id' => 'numero_bagni', 'min' => '1', 'max' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('fumatori', 'I fumatori sono accetti nell\'alloggio*', []) }}
                                            {{ Form::select('fumatori', ['0' => 'No', '1' => 'Si'], ['id' => 'fumatori']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('parcheggio', 'È presente un parcheggio dedicato ai risedenti nell\'alloggio*', []) }}
                                            {{ Form::select('parcheggio', ['0' => 'No', '1' => 'Si'], ['id' => 'parcheggio']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('wi_fi', 'È presente una connessione internet preinstallata*', []) }}
                                            {{ Form::select('wi_fi', ['0' => 'No', '1' => 'Si'], ['id' => 'wi_fi']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('ascensore', 'È presente un ascensore*', []) }}
                                            {{ Form::select('ascensore', ['0' => 'No', '1' => 'Si'], ['id' => 'ascensore']) }}
                                        </p>
                                    </fieldset>

                                    <!-- Caratteristiche SOLO dell'APPARTAMENTO -->
                                    <fieldset id="tipologia_appartamento_fieldset" style="display: none">
                                        <legend>TIPOLOGIA APPARTAMENTO*</legend>
                                        <p class="comment-form-author">
                                            {{ Form::label('tipologia_appartamento', 'Appartamento/Casa indipendente*', []) }}
                                            {{ Form::select('tipologia_appartamento', ['appartamento' => 'Appartamento', 'casa_indipendente' => 'Casa indipendente'], ['id' => 'tipologia_appartamento']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset id="caratteristiche_appartamento_fieldset" style="display: none">
                                        <legend>CARATTERISTICHE DELL'APPARTAMENTO</legend>
                                        <p class="comment-form-author">
                                            {{ Form::label('numero_camere', 'Numero camere presenti nell\'appartamento', []) }}
                                            {{ Form::number('numero_camere', '', ['id' => 'numero_camere', 'min' => '1', 'max' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('dimensioni_appartamento', 'Dimensioni dell\'appartamento (Metri quadri)', []) }}
                                            {{ Form::number('dimensioni_appartamento', '', ['id' => 'dimensioni_appartamento', 'min' => '1', 'max' => '1000']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('presenza_cucina', 'È presente una cucina*', []) }}
                                            {{ Form::select('presenza_cucina', ['0' => 'No', '1' => 'Si'], ['id' => 'presenza_cucina']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('presenza_locale_ricreativo', 'È presente una sala/locale ricreativo*', []) }}
                                            {{ Form::select('presenza_locale_ricreativo', ['0' => 'No', '1' => 'Si'], ['id' => 'presenza_locale_ricreativo']) }}
                                        </p>
                                    </fieldset>

                                    <!-- Caratteristiche SOLO del POSTO LETTO -->
                                    <fieldset id="tipologia_posto_letto_fieldset" style="display: none">
                                        <legend>TIPOLOGIA POSTO LETTO*</legend>
                                        <p class="comment-form-author">
                                            {{ Form::label('tipologia_posto_letto', 'Camera singola/condivisa*', []) }}
                                            {{ Form::select('tipologia_posto_letto', ['singola' => 'Camera singola', 'condivisa' => 'Camera condivisa'], ['id' => 'tipologia_posto_letto']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset id="caratteristiche_posto_letto_fieldset" style="display: none">
                                        <legend>CARATTERISTICHE CAMERA</legend>
                                        <p class="comment-form-author">
                                            {{ Form::label('dimensioni_camera', 'Dimensioni della camera (Metri quadri)', []) }}
                                            {{ Form::number('dimensioni_camera', '', ['id' => 'dimensioni_camera', 'min' => '1', 'max' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('letti_nella_camera', 'Numero di letti presenti nella camera', []) }}
                                            {{ Form::number('letti_nella_camera', '', ['id' => 'letti_nella_camera', 'min' => '1', 'max' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('presenza_angolo_studio', 'È presente un angolo studio nella camera*', []) }}
                                            {{ Form::select('presenza_angolo_studio', ['0' => 'No', '1' => 'Si'], ['id' => 'presenza_angolo_studio']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset name="condizioni_affitto">
                                        <legend>CONDIZIONI PER L'AFFITTO</legend>
                                        <p class="comment-form-author">
                                            {{ Form::label('canone_affitto', 'Canone di affitto mensile (€)*', []) }}
                                            {{ Form::number('canone_affitto', '', ['id' => 'canone_affitto', 'min' => '1', 'max' => '9999', 'step' => '0.01']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('caparra', 'Caparra (€)*', []) }}
                                            {{ Form::number('caparra', '', ['id' => 'caparra', 'min' => '1', 'max' => '9999', 'step' => '0.01']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('durata_minima_locazione', 'Durata minima dell\'affitto (mesi)*', []) }}
                                            {{ Form::number('durata_minima_locazione', '', ['id' => 'durata_minima_locazione', 'min' => '1', 'max' => '500']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('genere_preferito', 'Genere preferito degli affittuari*', []) }}
                                            {{ Form::select('genere_preferito', ['seleziona' => 'Seleziona', 'ND' => 'Indifferente', 'M' => 'M', 'F' => 'F'], ['id' => 'genere_preferito']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('eta_preferita_min', 'Minima età preferita degli affittuari', []) }}
                                            {{ Form::number('eta_preferita_min', '', ['id' => 'eta_preferita_min', 'min' => '18', 'max' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('eta_preferita_max', 'Massima età preferita degli affittuari', []) }}
                                            {{ Form::number('eta_preferita_max', '', ['id' => 'eta_preferita_max', 'min' => '18', 'max' => '100']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('periodo_disponibilita_inizio', 'L\'alloggio è disponibile dal:*', []) }}
                                            {{ Form::date('periodo_disponibilita_inizio',date('Y-m-d'),['id' => 'periodo_disponibilita_inizio']) }}
                                        </p>
                                        <p class="comment-form-author">
                                            {{ Form::label('periodo_disponibilita_fine', 'L\'alloggio è disponibile fino al:', []) }}
                                            {{ Form::date('periodo_disponibilita_fine', '',['id' => 'periodo_disponibilita_fine']) }}
                                        </p>
                                    </fieldset>

                                    <fieldset name="foto">
                                        <legend>FOTO DELL'ALLOGGIO</legend>
                                        <p class="comment-form-author">
                                            {{ Form::label('foto_annuncio[]', 'Inserisci le foto del tuo annuncio', []) }}
                                            {{ Form::file('foto_annuncio[]', ['class' => 'input', 'id' => 'foto_annuncio[]', 'multiple' => 'true', 'accept' => 'image/jpeg, image/jpg, image/png']) }}
                                        </p>
                                    </fieldset>
                                    <p class="form-submit" style="display: inline">
                                        {{ Form::reset('Reset', ['class' => 'aa-browse-btn']) }}
                                    </p>
                                    <p class="form-submit" style="display: inline">
                                        {{ Form::submit('Inserisci annuncio', ['class' => 'aa-browse-btn']) }}
                                    </p>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
