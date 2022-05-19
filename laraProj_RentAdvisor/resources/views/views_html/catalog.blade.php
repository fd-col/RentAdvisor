@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')

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
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/1.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>{{ $annuncio->citta }}</span>
                                        <span>Tipologia: {{ str_replace('_', ' ', $annuncio->tipologia) }}</span>
                                        <span>Posti letto totali: {{ $annuncio->numero_posti_letto_totali_alloggio }}</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">{{ $annuncio->titolo }}</a></h3>
                                        <p>{{ $annuncio->descrizione }}</p>
                                    </div>
                                    <div class="aa-properties-detial">
                                         <span class="aa-price">
                                            {{$annuncio->canone_affitto}}€
                                         </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                </div>
            </div>
            <!-- Start properties content bottom -->
            <div class="aa-properties-content-bottom">
                <nav>
                <ul class="pagination">
                    <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
                </nav>
            </div>
            <!-- / End properties content bottom -->
        </div>
    </section>
    <!-- / Latest property -->
    @endisset()
@endsection
