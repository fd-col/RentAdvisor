@extends('layouts.layout')

@section('title', 'Dettagli Annuncio')

@section('content')
    @isset($annuncio)
        @isset($caratteristiche)
            @isset($locatore)

                <script>
                    @can('isLocatore')
                    //Funzione alert elimina annuncio
                    jQuery(function(){
                        $('#ancora_elimina_annuncio').click(function(evt){
                            $var = confirm('Sei sicuro di voler eliminare l\'annuncio?');
                            if ($var == true) {
                                event.preventDefault();
                                document.getElementById('elimina_annuncio_form').submit();
                            } else {
                                evt.preventDefault();
                            }
                        });
                    })

                    @if($annuncio->disponibile)
                    //Funzione alert rendi annuncio non disponibile
                    jQuery(function(){
                        $('#ancora_rendi_non_disponibile').click(function(evt){
                            $var = confirm('Sei sicuro di voler rendere l\'annuncio non disponibile?');
                            if ($var == true) {
                                event.preventDefault();
                                $(location).attr('href',"{{ route('toggle_disponibile_annuncio', [$annuncio->id]) }}" );
                            } else {
                                evt.preventDefault();
                            }
                        });
                    })
                    jQuery(function(){
                        $('a.ancora_form_contratto').click(function(evt){
                            var string = "#form_contratto_".concat(evt.target.id);
                            $(string).toggle('slow');
                        });
                    })

                    @else
                    //Funzione alert rendi annuncio disponibile
                    jQuery(function(){
                        $('#ancora_rendi_disponibile').click(function(evt){
                            $var = confirm('Sei sicuro di voler rendere l\'annuncio disponibile?');
                            if ($var == true) {
                                event.preventDefault();
                                $(location).attr('href', "{{ route('toggle_disponibile_annuncio', [$annuncio->id]) }}" );
                            } else {
                                evt.preventDefault();
                            }
                        });
                    })
                    @endif
                    @endcan

                    @can('isLocatario')
                    //Funzione alert opziona annuncio
                    jQuery(function(){
                        $('#ancora_opziona_annuncio').click(function(evt){
                            $var = confirm('Sei sicuro di voler opzionare l\'annuncio?');
                            if ($var == true) {
                                event.preventDefault();
                                $(location).attr('href', "{{ route('toggle_opzione_annuncio', [$annuncio->id]) }}" );
                            } else {
                                evt.preventDefault();
                            }
                        });
                    })
                    jQuery(function(){
                        $('#ancora_togli_opzione_annuncio').click(function(evt){
                            $var = confirm('Sei sicuro di voler eliminare l\'opzione per l\'annuncio?');
                            if ($var == true) {
                                event.preventDefault();
                                $(location).attr('href', "{{ route('toggle_opzione_annuncio', [$annuncio->id]) }}" );
                            } else {
                                evt.preventDefault();
                            }
                        });
                    })
                    @endcan
                </script>

                <!-- Start Properties  -->
                <section id="aa-properties">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="aa-properties-content">
                                    <!-- Start properties content body -->
                                    <fieldset id="properties-title" style="border: hidden">
                                        <h2>{{ $annuncio->titolo }}</h2>
                                    </fieldset>


                                    <div class="aa-properties-details">
                                        <div class="aa-properties-details-img">
                                            @isset($immagini)
                                                @foreach($immagini as $immagine)
                                                    <img src="{{ asset("images/annunci/$immagine->nome_immagine") }}" alt="img">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('images/annunci/image_not_avaiable.jpg') }}" alt="img">
                                            @endisset
                                        </div>
                                        <div class="aa-properties-info">

                                            <span class="aa-price">Canone d'affitto : {{ $annuncio->canone_affitto }}€</span>
                                            @if($annuncio->disponibile)
                                                <h4>Disponibile</h4>
                                            @else
                                                <h4>Non disponibile</h4>
                                            @endif
                                            <h4>■ Descrizione :<br></h4>
                                            <h5>{{ $annuncio->descrizione }}</h5>
                                            <p>■ Tipologia: {{ str_replace('_', ' ', $annuncio->tipologia) }}</p>
                                            <h5>■ Data inserimento annuncio: {{ $annuncio->data_inserimento }}</h5>
                                            <h5>■ Caparra: {{$annuncio->caparra}}€</h5><br>
                                            <h4>Servizi inclusi</h4>
                                            <ul>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <li><span class="fa fa-bed"></span> Posti letto totali nell'alloggio: {{ $annuncio->numero_posti_letto_totali_alloggio }}</li>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <li><span class="fa fa-male"></span><span class="fa fa-female"></span> Numero bagni: {{ $annuncio->numero_bagni }}</li>
                                                        </td>
                                                    </tr>
                                                    @if($annuncio->fumatori == true)
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-fire"></span> Fumatori accetti</li>
                                                            </td>
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-fire-extinguisher"></span> Fumatori non accetti</li>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if($annuncio->parcheggio == true)
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-car"></span> Parcheggio</li>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if($annuncio->wi_fi == true)
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-wifi"></span> Wi-Fi</li>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if($annuncio->ascensore == true)
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-arrow-up"></span><span class="fa fa-arrow-down"></span> Ascensore</li>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </table>
                                            </ul>

                                            @if($annuncio->tipologia == 'appartamento')
                                                <h4>Caratteristiche appartamento</h4>
                                                <ul>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-home"></span> Tipologia appartamento: {{str_replace('_', ' ',$caratteristiche->tipologia_appartamento)}}</li>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if(!is_null($caratteristiche->numero_camere))
                                                                <li><span class="fa fa-bed"></span> Numero camere: {{$caratteristiche->numero_camere}}</li>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if(!is_null($caratteristiche->dimensioni_appartamento))
                                                                <li><span class="fa fa-arrows-h"></span> Dimensioni appartamento: {{$caratteristiche->dimensioni_appartamento}}mq</li>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @if($caratteristiche->presenza_cucina == true)
                                                            <tr>
                                                                <td>
                                                                    <li><span class="fa fa-fire"></span> Cucina</li>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if($caratteristiche->presenza_locale_ricreativo == true)
                                                            <tr>
                                                                <td>
                                                                    <li><span class="fa fa-television"></span> Locale ricreativo</li>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </table>
                                                </ul>
                                            @endif

                                            @if($annuncio->tipologia == 'posto_letto')
                                                <h4>Caratteristiche posto letto</h4>
                                                <ul>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <li><span class="fa fa-home"></span> Tipologia camera: {{$caratteristiche->tipologia_posto_letto}}</li>
                                                            </td>
                                                        <tr>
                                                            <td>
                                                                @if(!is_null($caratteristiche->dimensioni_camera))
                                                                <li><span class="fa fa-arrows-h"></span> Dimensioni camera: {{$caratteristiche->dimensioni_camera}}mq</li>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if(!is_null($caratteristiche->letti_nella_camera))
                                                                <li><span class="fa fa-bed"></span> Letti nella camera: {{$caratteristiche->letti_nella_camera}}</li>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @if($caratteristiche->presenza_angolo_studio == true)
                                                            <tr>
                                                                <td>
                                                                    <li><span class="fa fa-book"></span> Angolo studio
                                                                    </li>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </table>
                                                </ul>
                                            @endif


                                            <h4>Condizioni di locazione</h4>
                                            <p>■ Durata minima di locazione: {{$annuncio->durata_minima_locazione}}
                                                mesi</p>
                                            @if($annuncio->genere_preferito != 'ND')
                                                <p>■ Genere preferito dei locatari: {{$annuncio->genere_preferito}}</p>
                                            @endif
                                            @if(!is_null($annuncio->eta_preferita_min))
                                                <p>■ Età mimima locatari: {{$annuncio->eta_preferita_min}}</p>
                                            @endif
                                            @if(!is_null($annuncio->eta_preferita_max))
                                                <p>■ Età massima locatari: {{$annuncio->eta_preferita_max}}</p>
                                            @endif
                                            <p>■ Inizio disponibilità
                                                alloggio: {{$annuncio->periodo_disponibilita_inizio}}</p>
                                            @if(!is_null($annuncio->periodo_disponibilita_fine))
                                                <p>■ Fine disponibilità
                                                    alloggio: {{$annuncio->periodo_disponibilita_fine}}</p>
                                            @endif
                                            <p>■ Indirizzo: {{$annuncio->indirizzo}},{{$annuncio->numero_civico}}
                                                , {{$annuncio->citta}} ({{$annuncio->provincia}}) {{$annuncio->cap}}</p>
                                            <p>■ Zona di localizzazione: {{$annuncio->zona_di_localizzazione}}</p>
                                            <p>■ Piano: {{$annuncio->piano}}</p>
                                            <h4>Mappa</h4>
                                            <iframe
                                                src="https://maps.google.com/maps?q={{str_replace(' ','%20',$annuncio->indirizzo)}},{{str_replace(' ','%20',$annuncio->numero_civico)}},{{str_replace(' ','%20',$annuncio->cap)}},{{str_replace(' ','%20',$annuncio->citta)}},{{$annuncio->provincia}}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start properties sidebar -->
                            <div class="col-md-4">
                                <aside class="aa-properties-sidebar">
                                    <div class="aa-properties-single-sidebar">
                                        <h3>Locatore</h3>
                                        <h4>{{$locatore->nome}} {{$locatore->cognome}}</h4>
                                        <p>e-mail: {{$locatore->email}}<br>
                                            @if(!is_null($locatore->telefono))
                                                telefono: {{$locatore->telefono}}<br>
                                            @endif
                                        </p>
                                    </div>
                                </aside>

                                <aside class="aa-properties-sidebar">
                                    <div class="aa-properties-single-sidebar">
                                        <!-- Ancore alle funzioni del Locatore -->
                                        @can('isLocatore')
                                            @if(auth()->user()->username == $locatore->username)

                                                <!-- Ancora per rendere l'annuncio non disponibile -->
                                                <br>
                                                @if($annuncio->disponibile)
                                                    <p>Se hai affittato il tuo alloggio al di fuori di RentAdvisor puoi rendere l'annuncio non disponibile. Gli utenti del sito potranno visualizzarlo, ma non opzionarlo. <br></p>
                                                    <h4><a id="ancora_rendi_non_disponibile"><span class="fa fa-hand-o-down"></span> Rendi non disponibile<br><br></a></h4>
                                                @else
                                                    <p>Il tuo alloggio è tornato disponibile? Rendilo nuovamente opzionabile</p>
                                                    <h4><a id="ancora_rendi_disponibile"><span class="fa fa-hand-o-up"></span> Rendi disponibile<br><br></a></h4>
                                                @endif

                                                <!-- Link per la modifica dell'annuncio -->
                                                <h4><a href="{{ route('modifica_annuncio', [$annuncio->id]) }}"><span class="fa fa-edit"></span> Modifica annuncio<br><br></a></h4>

                                                <!-- Link per l'eliminazione dell'annuncio -->
                                                <h4><a href="" id="ancora_elimina_annuncio"><span class="fa fa-trash"></span> Elimina annuncio<br><br></a></h4>
                                                <form id="elimina_annuncio_form" action="{{ route('conferma_elimina_annuncio') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ Form::text('id', "$annuncio->id",['style' => 'display: none']) }}
                                                </form>
                                    </div>
                                </aside>

                                <aside class="aa-properties-sidebar">
                                    <div class="aa-properties-single-sidebar">
                                                <!-- Locatari che hanno opzionato l'annuncio -->
                                                @isset($utenti_che_hanno_opzionato)
                                                    <br>
                                                    <h2>Opzioni</h2>
                                                    <p>Ecco gli utenti che hanno opzionato questo annuncio</p>
                                                    <div class="col-md-12">
                                                        <div class="aa-comments-area">
                                                            <div class="comments">
                                                                <ul class="commentlist">
                                                                    @foreach($utenti_che_hanno_opzionato as $utente)
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <span class="fa fa-user"></span>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="author-name">{{$utente->username}}</h4>
                                                                                    <p>
                                                                                        {{$utente->nome}} {{$utente->cognome}} <br>
                                                                                        Sesso: {{$utente->genere}} <br>
                                                                                        Età: {{ (new DateTime($utente->data_nascita))->diff((new DateTime(now())))->y }} <br>
                                                                                        Email: {{ $utente->email }}
                                                                                    </p>
                                                                                    <a class="reply-btn" href="">Vai alla chat</a>
                                                                                    @if($annuncio->disponibile)
                                                                                        <a class="ancora_form_contratto" id={{ $utente->username }}><span class="fa fa-edit"></span> Crea contratto</a>
                                                                                        {{ Form::open(array('route' => 'inserisci_contratto', 'class' => 'contactform', 'style' => 'display:none', 'id' => "form_contratto_$utente->username")) }}
                                                                                        {{ Form::text('id_annuncio', "$annuncio->id",['style' => 'display: none']) }}
                                                                                        {{ Form::text('username_locatore', auth()->user()->username, ['style' => 'display: none']) }}
                                                                                        {{ Form::text('username_locatario',  $utente->username , ['style' => 'display: none']) }}
                                                                                        {{ Form::label('data_inizio', 'Data di inizio del contratto*') }}
                                                                                        {{ Form::date('data_inizio', '',['id' => 'data_inizio', 'aria-required' => 'true']) }}
                                                                                        @if ($errors->first('data_inizio'))
                                                                                            <ul>
                                                                                                @foreach ($errors->get('data_inizio') as $message)
                                                                                                    <li class="richiesta">{{ $message }}</li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @endif
                                                                                        {{ Form::label('data_fine', 'Data di fine del contratto*') }}
                                                                                        {{ Form::date('data_fine', '',['id' => 'data_fine', 'aria-required' => 'true']) }}
                                                                                        @if ($errors->first('data_fine'))
                                                                                            <ul>
                                                                                                @foreach ($errors->get('data_fine') as $message)
                                                                                                    <li class="richiesta">{{ $message }}</li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @endif
                                                                                        {{ Form::submit('Stipula contratto') }}
                                                                                        {{ Form::close() }}
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endisset

                                            @endif
                                        @endcan

                                        <!-- Ancore alle funzioni del Locatario -->
                                        @can('isLocatario')
                                                <h4><a href=""><span class="fa fa-envelope"></span> Contatta il locatore</a></h4>
                                            @isset($opzionato)
                                                @if(!$opzionato)
                                                    @if($annuncio->disponibile)
                                                        <br>
                                                        <p>Opziona questo annuncio per far sapere al proprietario di essere interessato ad affittarlo, lui potrà sceglierti per stipulare un contratto</p>
                                                        <h4><a id="ancora_opziona_annuncio"><span class="fa fa-check-square"></span> Opziona l'annuncio</a></h4>
                                                    @endif
                                                @else
                                                    <br>
                                                    <p>Hai già opzionato questo annuncio, lo puoi visualizzare anche nel tuo profilo <br>Se non sei più interessato puoi eliminare la tua opzione</p>
                                                    <h4><a id="ancora_togli_opzione_annuncio"><span class="fa fa-square-o"></span> Togli l'opzione all'annuncio</a></h4>
                                                @endif
                                            @endisset
                                        @endcan
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- / Properties  -->
            @endisset
        @endisset
    @endisset
@endsection
