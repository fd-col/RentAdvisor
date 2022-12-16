@extends('layouts.layout')

@section('title', 'Profilo Studente')


<!-- CONTENT -->
@section('content')

    <!-- Script per attivare la modifica dei dati -->
    <script>
        jQuery(function(){
            $('#bottone_modifica').click(function(){
                $('#nome').removeAttr('readonly');
                $('#cognome').removeAttr('readonly');
                $('#data_nascita').removeAttr('readonly');
                $('#telefono').removeAttr('readonly');
                $('#genere').removeAttr('readonly');
                $('#bottone_salva_dati').show();
                $('#bottone_modifica').hide();
            });
        })
    </script>

    <!-- Section annunci opzionati -->
    @isset($annunci_opzionati)
        <section id="aa-latest-property">
            <div class="container">
                <div class="aa-latest-property-area">
                    <div class="aa-title">
                        <h2>Annunci opzionati da te</h2>
                        <span></span>
                        <p>Ecco a te gli annunci che hai opzionato su RentAdvisor</p>
                    </div>
                    <div class="aa-latest-properties-content">
                        <div class="row">
                            @foreach($annunci_opzionati as $annuncio)
                                @if($loop->index % 3 == 0)
                                    <div class="row">
                                        @endif
                                        <div class="col-md-4">
                                            <article class="aa-properties-item">
                                                <div class="aa-properties-details-img">
                                                    @isset($immagini)
                                                        @foreach($immagini as $immagine)
                                                            @if($annuncio->id == $immagine->id_annuncio)
                                                                <img src="{{ asset("images/annunci/$immagine->nome_immagine") }}" alt="img">
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <img src="{{ asset('images/annunci/image_not_avaiable.jpg') }}" alt="img">
                                                    @endisset
                                                </div>
                                                @if($annuncio->disponibile)
                                                    <div class="aa-tag for-sale">
                                                        Affittasi
                                                    </div>
                                                @else
                                                    <div class="aa-tag sold-out">
                                                        Non disponibile
                                                    </div>
                                                @endif
                                                <div class="aa-properties-item-content">
                                                    <div class="aa-properties-info">
                                                        <span><strong>Città</strong> : {{ $annuncio->citta }}</span>
                                                        <span><strong>Tipologia</strong> : {{ str_replace('_', ' ', $annuncio->tipologia) }}</span>
                                                    </div>
                                                    <div class="aa-properties-about">
                                                        <h3>
                                                            <a href="{{ route('dettagli_annuncio', [$annuncio->id]) }}">{{ substr($annuncio->titolo, 0, 50) }}...</a>
                                                        </h3>
                                                        <p>{{ substr($annuncio->descrizione, 0, 120) }} ...</p>
                                                    </div>
                                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      {{$annuncio->canone_affitto}}€
                    </span>
                                                        <a href="{{ route('dettagli_annuncio', [$annuncio->id]) }}"
                                                           class="aa-secondary-btn">Dettagli</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        @if($loop->index % 3 == 2)
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
    <!-- /Section annunci opzionati -->



    @isset($user)
        <!-- Start profile section -->
        <section id="aa-contact">
            <div class="aa-contact-area">
                <div class="aa-contact-bottom">
                    <div class="aa-title">
                        <h2>I Tuoi Dati</h2>
                        <span></span>
                        <p>Qui puoi trovare i dati del tuo profilo e modificarli, i campi obbligatori sono contrassegnati con *</p>
                    </div>
                    <div class="aa-contact-form">
                        {{ Form::open(array('route' => 'modifica_dati_locatario' ,'class' => 'contactform')) }}
                        <div class="aa-properties-content-body">
                            <ul class="aa-properties-nav">
                                <li>
                                    <div class="col-xs-6">
                                        <div class="aa-single-field">
                                            {{ Form::label('username', 'Username (non modificabile)') }}
                                            {{ Form::text('username', "$user->username", ['id' => 'username', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('username'))
                                                <ul>
                                                    @foreach ($errors->get('username') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="aa-single-field">
                                            {{ Form::label('nome', 'Nome*') }}
                                            {{ Form::text('nome', "$user->nome", ['id' => 'nome', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('nome'))
                                                <ul>
                                                    @foreach ($errors->get('nome') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="aa-single-field">
                                            {{ Form::label('cognome', 'Cognome*') }}
                                            {{ Form::text('cognome', "$user->cognome", ['id' => 'cognome', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('cognome'))
                                                <ul>
                                                    @foreach ($errors->get('cognome') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="aa-single-field">
                                            {{ Form::label('email', 'Email (non modificabile)') }}
                                            {{ Form::text('email', "$user->email", ['id' => 'email', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('email'))
                                                <ul>
                                                    @foreach ($errors->get('email') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-xs-6">
                                        <div class="aa-single-field">

                                        </div>
                                        <div class="aa-single-field">
                                            {{ Form::label('data_nascita', 'Data di nascita* (AAAA-MM-GG)') }}
                                            {{ Form::text('data_nascita', "$user->data_nascita", ['id' => 'data_nascita', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('data_nascita'))
                                                <ul>
                                                    @foreach ($errors->get('data_nascita') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="aa-single-field">
                                            {{ Form::label('telefono', 'Telefono') }}
                                            {{ Form::text('telefono', "$user->telefono", ['id' => 'telefono', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('telefono'))
                                                <ul>
                                                    @foreach ($errors->get('telefono') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="aa-single-field">
                                            {{ Form::label('genere', 'Genere* (M/F/ND)') }}
                                            {{ Form::text('genere', "$user->genere", ['id' => 'genere', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                            @if ($errors->first('genere'))
                                                <ul>
                                                    @foreach ($errors->get('genere') as $message)
                                                        <li class="richiesta">{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-md-offset-5">
                            <p class="form-submit" style="display: none" id="bottone_salva_dati">
                                {{ Form::submit('Salva') }}
                            </p>
                        </div>
                        {{ Form::close() }}
                        <div class="col-md-2 col-md-offset-5">
                            <p class="form-submit">
                                <input type="button" id="bottone_modifica" value="Modifica dati personali">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / End profile section -->
    @endisset
@endsection
