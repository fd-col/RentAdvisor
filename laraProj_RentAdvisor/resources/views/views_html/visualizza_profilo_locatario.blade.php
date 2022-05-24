@extends('layouts.layout')

@section('title', 'Profilo Studente')


<!-- CONTENT -->
@section('content')
    @isset($user)
        <!-- Start form section -->
        <!-- Le classi di stile utilizzate sono quelle della form di contatto in modo da non doverle rifare-->
        <section id="aa-contact">
                        <div class="aa-contact-area">
                            <div class="aa-contact-bottom">
                                <div class="aa-title">
                                    <h2>Profilo</h2>
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
        <!-- / End form section -->
    @endisset
@endsection
