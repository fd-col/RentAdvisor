@extends('layouts.layout')

@section('title', 'Home')

<!-- CONTENT -->
@section('content')
    @isset($annunci)
        <!-- Latest property -->
        <section id="aa-latest-property">
            <div class="container">
                <div class="aa-latest-property-area">
                    <div class="aa-title">
                        <h2>Annunci</h2>
                        <span></span>
                        <p>Ecco a te alcuni degli ultimi annunci inserito in RentAdvisor!</p>
                    </div>
                    <div class="aa-latest-properties-content">
                        <div class="row">


                            @foreach($annunci as $annuncio)
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
                                                    <a href="{{ route('dettagli_annuncio', [$annuncio->id]) }}">{{ substr($annuncio->titolo, 0, 80) }}...</a>
                                                </h3>
                                                <p>{{ substr($annuncio->descrizione, 0, 200) }} ...</p>
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
        <!-- / Latest property -->
    @endisset

    <!-- Service section -->
    <section id="aa-service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-service-area">
                        <div class="aa-title">
                            <h2>Chi siamo</h2>
                            <span></span><br>
                            <q>Fide et Fiducia</q><hr>
                            <p>Ecco alcuni dei nostri servizi professionali per i clienti : </p>
                        </div>
                        <!-- service content -->
                        <div class="aa-service-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span class="fa fa-home"></span>
                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="#">Affitti appartamenti</a></h4>
                                            <p>Siamo un'<strong>azienda Leader</strong> nel settore degli affitti immobiliari.
                                            Da <strong>15 anni </strong>lavoriamo per offire le migliori soluzioni ai
                                            locatori e agli <strong>studenti universitari</strong> .</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span class="fa fa-check"></span>
                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="#">Affitti posti letto</a></h4>
                                            <p>Troviamo <strong>soluzioni ad hoc</strong> per soddisfare le neccessità
                                            di ciascun Locatore e Studente che si rivolge al nostro sito.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span class="fa fa-crosshairs"></span>
                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="#">Assistenza personale</a></h4>
                                            <p>Fai affidamento al nostro servizio assistenza attivo <strong>24h</strong>
                                            al giorno, <strong>7/7g</strong> .</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span class="fa fa-bar-chart-o"></span>
                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="#">Trasparenza e Sicurezza</a></h4>
                                            <p>Sarai sempre <b>informato</b> su ciò che per te è importante, e <b>libero</b>
                                            di agire su i tuoi dati personali, e gli appartamenti  <br>
                                            (in tuo possesso o di tuo interesse) .
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Service section -->


    <!-- Our Agent Section-->
    <section id="aa-agents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-agents-area">
                        <div class="aa-title">
                            <h2>I nostri agenti</h2>
                            <span></span>
                            <p>Affidati ai nostri agenti qualificati. Sapranno risolvere ogni tuo problema in base al
                                campo di competenza relativo ad ognuno.</p>
                        </div>
                        <!-- agents content -->
                        <div class="aa-agents-content">
                            <ul class="aa-agents-slider">

                                <li>
                                    <div class="aa-single-agents">
                                        <div class="aa-agents-img">
                                            <img src="{{ asset('images/agents/civitarese.png') }}"
                                                 alt="agent member image">
                                        </div>
                                        <div class="aa-agetns-info">
                                            <h4><a href="#">Andrea Civitarese</a></h4>
                                            <span>Ingegnere</span>
                                            <div class="aa-agent-social">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="aa-single-agents">
                                        <div class="aa-agents-img">
                                            <img src="{{ asset('images/agents/camplese.png') }}"
                                                 alt="agent member image">
                                        </div>
                                        <div class="aa-agetns-info">
                                            <h4><a href="#">Francesco Camplese</a></h4>
                                            <span>Notaio</span>
                                            <div class="aa-agent-social">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="aa-single-agents">
                                        <div class="aa-agents-img">
                                            <img src="{{ asset('images/agents/colleluori.jpg') }}"
                                                 alt="agent member image">
                                        </div>
                                        <div class="aa-agetns-info">
                                            <h4><a href="#">Federico Colleluori</a></h4>
                                            <span>Consulente Specializzato</span>
                                            <div class="aa-agent-social">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="aa-single-agents">
                                        <div class="aa-agents-img">
                                            <img src="{{ asset('images/agents/agent-4.png') }}"
                                                 alt="agent member image">
                                        </div>
                                        <div class="aa-agetns-info">
                                            <h4><a href="#">Paolo Cappelletti</a></h4>
                                            <span>Ingegnere</span>
                                            <div class="aa-agent-social">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Our Agent Section-->
@endsection
