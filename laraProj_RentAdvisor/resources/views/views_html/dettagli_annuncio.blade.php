@extends('layouts.layout')

@section('title', 'Dettagli Annuncio')

@section('content')
    @isset($annuncio)
        @isset($caratteristiche)
            @isset($locatore)

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
                                                <p>Fine disponibilità
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
                                        <br><br>
                                        <h3>Locatore</h3>
                                        <h4>{{$locatore->nome}} {{$locatore->cognome}}</h4>
                                        <p>e-mail: {{$locatore->email}}<br>
                                            @if(!is_null($locatore->telefono))
                                                telefono: {{$locatore->telefono}}<br>
                                            @endif
                                        </p>
                                        <br><br>
                                        @can('isLocatore')
                                            @if(auth()->user()->username == $locatore->username)
                                                <h4><a href=""><span class="fa fa-edit"></span> Modifica annuncio</a></h4>
                                                <h4><a href=""><span class="fa fa-trash"></span> Elimina annuncio</a></h4>
                                            @endif
                                        @endcan
                                        @can('isLocatario')
                                                <h4><a href=""><span class="fa fa-envelope"></span> Contatta il locatore</a></h4>
                                                <h4><a href=""><span class="fa fa-check-square"></span> Opziona l'annuncio</a></h4>
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
