@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')

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
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/1.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>5 Rooms</span>
                                        <span>2 Beds</span>
                                        <span>3 Baths</span>
                                        <span>1100 SQ FT</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">Appartment Title</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>
                                    </div>
                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      $35000
                    </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/2.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>5 Rooms</span>
                                        <span>2 Beds</span>
                                        <span>3 Baths</span>
                                        <span>1100 SQ FT</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">Appartment Title</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>
                                    </div>
                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      $11000
                    </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/3.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>5 Rooms</span>
                                        <span>2 Beds</span>
                                        <span>3 Baths</span>
                                        <span>1100 SQ FT</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">Appartment Title</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>
                                    </div>
                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      $15000
                    </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/4.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>5 Rooms</span>
                                        <span>2 Beds</span>
                                        <span>3 Baths</span>
                                        <span>1100 SQ FT</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">Appartment Title</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>
                                    </div>
                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      $35000
                    </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/5.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>5 Rooms</span>
                                        <span>2 Beds</span>
                                        <span>3 Baths</span>
                                        <span>1100 SQ FT</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">Appartment Title</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>
                                    </div>
                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      $11000
                    </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="aa-properties-item">
                                <a href="#" class="aa-properties-item-img">
                                    <img src="{{ asset('images/item/6.jpg') }}" alt="img">
                                </a>
                                <div class="aa-properties-item-content">
                                    <div class="aa-properties-info">
                                        <span>5 Rooms</span>
                                        <span>2 Beds</span>
                                        <span>3 Baths</span>
                                        <span>1100 SQ FT</span>
                                    </div>
                                    <div class="aa-properties-about">
                                        <h3><a href="#">Appartment Title</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>
                                    </div>
                                    <div class="aa-properties-detial">
                    <span class="aa-price">
                      $15000
                    </span>
                                        <a href="{{ route('dettagli_annuncio') }}" class="aa-secondary-btn">Dettagli</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
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
@endsection
