<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentAdvisor | Registrazione</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/home_house.png') }}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap_layout.js') }}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <!-- mixit slider -->
    <script type="text/javascript" src="{{ asset('js/jquery.mixitup.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<section id="aa-signin">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="aa-signin-area">
                    <div class="aa-signin-form">
                        <div class="aa-signin-form-title">
                            <h1>Registrazione</h1>
                            <h3>Crea il tuo account e accedi ai servizi <br><br></h3>
                            <p class="richiesta">I campi contrassegnati con * sono obbligatori</p>
                            <br>
                        </div>
                        {{ Form::open(array('route' => 'register', 'class' => 'contactform')) }}
                            <div class="aa-properties-content-body">
                                <ul class="aa-properties-nav">
                                    <li>
                                        <div class="col-sm-5"> <!-- stile bootstrap -->
                                            <div  class="aa-single-field">
                                                {{ Form::label('username', 'Username*') }}
                                                {{ Form::text('username', '', ['id' => 'username', 'aria-required' => 'true']) }}
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
                                                {{ Form::text('nome', '', ['id' => 'nome', 'aria-required' => 'true']) }}
                                                @if ($errors->first('nome'))
                                                    <ul>
                                                        @foreach ($errors->get('nome') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div  class="aa-single-field">
                                                {{ Form::label('cognome', 'Cognome*') }}
                                                {{ Form::text('cognome', '', ['id' => 'cognome', 'aria-required' => 'true']) }}
                                                @if ($errors->first('cognome'))
                                                    <ul>
                                                        @foreach ($errors->get('cognome') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div  class="aa-single-field">
                                                {{ Form::label('email', 'Email*') }}
                                                {{ Form::text('email', '', ['id' => 'email', 'aria-required' => 'true']) }}
                                                @if ($errors->first('email'))
                                                    <ul>
                                                        @foreach ($errors->get('email') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div  class="aa-single-field">
                                                {{ Form::label('password', 'Password*') }}
                                                {{ Form::password('password', ['id' => 'password', 'aria-required' => 'true']) }}
                                                @if ($errors->first('password'))
                                                    <ul>
                                                        @foreach ($errors->get('password') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-sm-5">
                                            <div class="aa-single-field">
                                                {{ Form::label('role', 'Tipologia di utente*') }}
                                                <br>
                                                {{ Form::select('role', ['locatore' => 'Locatore', 'locatario' => 'Locatario'], ['id' => 'role', 'aria-required' => 'true']) }}
                                                @if ($errors->first('role'))
                                                    <ul>
                                                        @foreach ($errors->get('role') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>

                                            <div class="aa-single-field">
                                                <br>
                                                {{ Form::label('data_nascita', 'Data di nascita*') }}
                                                <br>
                                                {{ Form::date('data_nascita', '1990-01-01',['id' => 'data_nascita', 'aria-required' => 'true']) }}
                                                @if ($errors->first('data_nascita'))
                                                    <ul>
                                                        @foreach ($errors->get('data_nascita') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="aa-single-field">
                                                <br>
                                                {{ Form::label('genere', 'Genere*') }}
                                                {{ Form::select('genere', ['M' => 'Uomo', 'D' => 'Donna', 'ND' => 'Non dichiarato'], ['id' => 'genere', 'aria-required' => 'true']) }}
                                                @if ($errors->first('genere'))
                                                    <ul>
                                                        @foreach ($errors->get('genere') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="aa-single-field">
                                                <br>
                                                {{ Form::label('telefono', 'Telefono') }}
                                                {{ Form::text('telefono', '', ['id' => 'telefono', 'aria-required' => 'true']) }}
                                                @if ($errors->first('telefono'))
                                                    <ul>
                                                        @foreach ($errors->get('telefono') as $message)
                                                            <li class="richiesta">{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div  class="aa-single-field">
                                                {{ Form::label('password-confirm', 'Conferma password*') }}
                                                {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'aria-required' => 'true']) }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="aa-single-submit">
                                {{ Form::submit('Registrati') }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>

