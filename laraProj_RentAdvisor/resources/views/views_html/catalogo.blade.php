@extends('layouts.layout')

@can('isLocatario')             
    @section('title', 'Ricerca')
@else
    @section('title', 'Catalogo')
@endcan


@section('content')
	@can('isLocatario')
	    <!-- Advance Search -->
	    @include('layouts._search')
	    <!-- / Advance Search -->
	@endcan

    @isset($annunci)

        <!-- Catalogo -->
        <section id="aa-latest-property">
            <div class="container">
                <div class="aa-latest-property-area">
                    <div class="aa-title">
                        <h2>Catalogo</h2>
                        <span></span>
                        <p>Ecco a te tutti gli annunci inseriti in RentAdvisor!</p>
                    </div>

                    <div class="aa-latest-properties-content">
                        <div class="row">
                            @foreach($annunci as $annuncio)
                                @if($loop->index % 3 == 0)
                                    <div class="row">
                                        @endif
                                <div class="col-md-4">
                                    <article class="aa-properties-item">
                                        <div href="{{ route('dettagli_annuncio', [$annuncio->id]) }}"
                                           class="aa-properties-details-img">
                                            @isset($immagini)
                                                @foreach($immagini as $immagine)
                                                    @if($immagine->id_annuncio == $annuncio->id)
                                                        <img src="{{ asset("images/annunci/$immagine->nome_immagine") }}" alt="img">
                                                    @endif
                                                @endforeach
                                            @else
                                                <img src="{{ asset("images/annunci/image_not_avaiable.jpg") }}" alt="img">
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
                                                <a href="{{ route('dettagli_annuncio', [$annuncio->id]) }}" class="aa-secondary-btn">Dettagli</a>
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
                    <!--Paginazione-->
                    @include('pagination.paginator', ['paginator' => $annunci])
                </div>
            </div>
        </section>
        <!-- / Latest property -->
    @endisset()
@endsection
