<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentAdvisor | Accesso</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/home_house.png') }}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


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
                            <h1>Accedi</h1>
                            <h3>Accedi al tuo profilo per sfuttare tutte le funzionalità di RentAdvisor</h3>
                        <div class="col-sm-8 col-sm-offset-1">
                        </div>
                        {{ Form::open(array('route' => 'login', 'class' => 'contactform')) }}
                            <div class="aa-single-field">
                                <br>
                                {{ Form::label('username', 'Username') }}
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
                                {{ Form::label('password', 'Password') }}
                                {{ Form::password('password', ['id' => 'password', 'aria-required' => 'true']) }}
                                @if ($errors->first('password'))
                                    <ul>
                                        @foreach ($errors->get('password') as $message)
                                            <li class="richiesta">{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="aa-single-submit">
                                {{ Form::submit('Accedi', ['class' => 'aa-browse-btn']) }}
                                <p>Non hai ancora un account? <a href="{{ route('register') }}">Crealo ora!</a></p>
                            </div>
                        {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

</body>
</html>
