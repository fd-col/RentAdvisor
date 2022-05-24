@extends('layouts.layout')

@section('title', 'Area Personale')


<!-- CONTENT -->
@section('content')
    @isset($user)
    <!-- Start Properties  -->
    <section id="aa-properties">
        <div class="aa-title">
        <h2>La tua area personale</h2>
        <span></span>
        <p>In questa pagina puoi trovare tutte le informazioni sui tuoi annunci pubblicati, la possbilità di inserire un annuncio, di comunicare con le persone interessate e di modificare i dati relativi al tuo profilo. </p>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="aa-properties-content">
                    <!-- start properties content head -->
                    <div class="aa-properties-content-head">
                        I tuoi annunci
                        <div class="aa-properties-content-head-right">
                            <a id="aa-grid-properties" href="#"><span class="fa fa-th"></span></a>
                            <a id="aa-list-properties" href="#"><span class="fa fa-list"></span></a>
                        </div>
                    </div>

                <!-- Start properties content body -->
                <div class="aa-properties-content-body">
                <ul class="aa-properties-nav">
                    <li>
                    <article class="aa-properties-item">
                        <a class="aa-properties-item-img" href="#">
                        <img alt="img" src="{{ asset('images/slider/appartamenti/appartamento2.0.jpg') }}">
                        </a>
                        <div class="aa-tag for-rent">
                        For Rent
                        </div>
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
                            <a class="aa-secondary-btn" href="#">View Details</a>
                        </div>
                        </div>
                    </article>
                    </li>
                    <li>
                    <article class="aa-properties-item">
                        <a class="aa-properties-item-img" href="#">
                        <img alt="img" src="{{ asset('images/slider/appartamenti/appartamento1.0.jpg') }}">
                        </a>
                        <div class="aa-tag sold-out">
                        Sold Out
                        </div>
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
                            <a class="aa-secondary-btn" href="#">View Details</a>
                        </div>
                        </div>
                    </article>
                    </li>
                    <li>
                    <article class="aa-properties-item">
                        <a class="aa-properties-item-img" href="#">
                        <img alt="img" src="{{ asset('images/slider/appartamenti/appartamento3.0.jpg') }}">
                        </a>
                        <div class="aa-tag sold-out">
                        Sold Out
                        </div>
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
                            <a class="aa-secondary-btn" href="#">View Details</a>
                        </div>
                        </div>
                    </article>
                    </li>
                    <li>
                    <article class="aa-properties-item">
                        <a class="aa-properties-item-img" href="#">
                        <img alt="img" src="{{ asset('images/slider/appartamenti/appartamento2.2.jpg') }}">
                        </a>
                        <div class="aa-tag for-sale">
                        For Sale
                        </div>
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
                            <a class="aa-secondary-btn" href="#">View Details</a>
                        </div>
                        </div>
                    </article>
                    </li>
                </ul>
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
                    <li class="{{ Route::is('   1 pagina catalogo   ') ? 'active' : '' }}"><a href="#">1</a></li>
                    <li class="{{ Route::is('   2 pagina catalogo   ') ? 'active' : '' }}"><a href="#">2</a></li>
                    <li class="{{ Route::is('   3 pagina catalogo   ') ? 'active' : '' }}"><a href="#">3</a></li>
                    <li class="{{ Route::is('   4 pagina catalogo   ') ? 'active' : '' }}"><a href="#">4</a></li>
                    <li class="{{ Route::is('   5 pagina catalogo   ') ? 'active' : '' }}"><a href="#">5</a></li>
                    <li class="{{ Route::is('   Next pagina catalogo   ') ? 'active' : '' }}">
                        <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    </ul>
                </nav>
                </div>
            </div>
            </div>
            <!-- Start properties sidebar -->
            <div class="col-md-4">
            <aside class="aa-properties-sidebar">
                <!-- Start Single properties sidebar -->
                <div class="aa-properties-single-sidebar">
                    <a href="inserimento_annuncio.html" class="round-button">INSERISCI</a>
                    <br>
                    <div class="aa-title">
                    <span></span>
                    <h2>Chat</h2>
                    </div>
                <!-- comment threats -->
                <div class="col-md-12">
                <div class="aa-comments-area">
                    <h3>2 Comments</h3>
                    <div class="comments">
                    <ul class="commentlist">
                        <li>
                        <div class="media">
                            <div class="media-left">
                                <img alt="img" src="{{ asset('images/generic-user-image.jpeg') }}" class="media-object news-img">
                            </div>
                            <div class="media-body">
                            <h4 class="author-name">Adam Barney</h4>
                            <span class="comments-date"> 20th April, 2016</span>
                            <p>Ultimo messaggio inviato o ricevuto</p>
                            <a class="reply-btn" href="#">Reply</a>
                            </div>
                        </div>
                        </li>
                        <li>
                        <div class="media">
                            <div class="media-left">
                                <img alt="img" src="{{ asset('images/generic-user-image.jpeg') }}" class="media-object news-img">
                            </div>
                            <div class="media-body">
                            <h4 class="author-name">John Smith</h4>
                            <span class="comments-date"> 20th April, 2016</span>
                            <p>Ultimo messaggio inviato o ricevuto</p>
                            <a class="reply-btn" href="#">Reply</a>
                            </div>
                        </div>
                        </li>
                <!-- comments pagination -->
                <nav>
                    <ul class="pagination comments-pagination">
                    <li>
                        <a aria-label="Previous" href="#">
                        <span aria-hidden="true">«</span>
                        <span aria-hidden="true">»</span>
                        </a>
                    </li>
                    </ul>
                </nav>

                </div>
            </aside>
            </div>
        </div>
        </div>
    </section>
    <!-- / Properties  -->

    <!-- Start profile section -->
    <section id="aa-contact">
                    <div class="aa-contact-area">
                        <div class="aa-contact-bottom">
                            <div class="aa-title">
                                <h2>I Tuoi Dati</h2>
                                <span></span>
                                <p>I dati relativi al tuo profilo </p>
                            </div>
                            <div class="aa-contact-form">
                                    {{ Form::open(array('class' => 'contactform')) }}
                                    <div class="aa-properties-content-body">
                                        <ul class="aa-properties-nav">
                                            <li>
                                                <div class="col-xs-6">
                                                    <div class="aa-single-field">
                                                        {{ Form::label('username', 'Username*') }}
                                                        {{ Form::text('username', "$user->username", ['id' => 'username', 'aria-required' => 'true']) }}
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
                                                        {{ Form::text('nome', "$user->nome", ['id' => 'nome', 'aria-required' => 'true']) }}
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
                                                        {{ Form::text('cognome', "$user->cognome", ['id' => 'cognome', 'aria-required' => 'true']) }}
                                                        @if ($errors->first('cognome'))
                                                        <ul>
                                                            @foreach ($errors->get('cognome') as $message)
                                                                <li class="richiesta">{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>
                                                    <div class="aa-single-field">
                                                        {{ Form::label('email', 'Email*') }}
                                                        {{ Form::text('email', "$user->email", ['id' => 'email', 'aria-required' => 'true']) }}
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
                                                    {{ Form::label('data_nascita', 'Data di nascita*') }}
                                                        {{ Form::text('data_nascita', "$user->data_nascita", ['id' => 'data_nascita', 'aria-required' => 'true']) }}
                                                        @if ($errors->first('cognome'))
                                                        <ul>
                                                            @foreach ($errors->get('data_nascita') as $message)
                                                                <li class="richiesta">{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>
                                                    <div class="aa-single-field">
                                                        {{ Form::label('telefono', 'Telefono*') }}
                                                        {{ Form::text('telefono', "$user->telefono", ['id' => 'telefono', 'aria-required' => 'true']) }}
                                                        @if ($errors->first('telefono'))
                                                        <ul>
                                                            @foreach ($errors->get('telefono') as $message)
                                                                <li class="richiesta">{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>
                                                    <div class="aa-single-field">
                                                        {{ Form::label('genere', 'Genere*') }}
                                                        {{ Form::text('genere', "$user->genere", ['id' => 'genere', 'aria-required' => 'true']) }}
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
                                    <p class="form-submit">
                                        {{ Form::submit('Modifica') }}
                                    </p>
                                </form>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
    </section>
    <!-- / End profile section -->
    @endisset
@endsection
