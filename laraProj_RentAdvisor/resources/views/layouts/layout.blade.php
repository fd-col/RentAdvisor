<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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


    <title>RentAdvisor | @yield('title', 'Home')</title>

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

<!-- Start navbar section -->
    @include('layouts._navbar')
<!-- End navbar section -->

<!-- Start slider  -->
<section id="aa-slider">
    <div class="aa-slider-area">
        <!-- Top slider -->
        <div class="aa-top-slider">
            <!-- Top slider single slide -->
            <div class="aa-top-slider-single">
                <img src="{{ asset('images/slider/Pescara.png') }}" alt="img">
                <!-- Top slider content -->
                <div class="aa-top-slider-content">
                    <div class="aa-property-header-inner">
                        <h2>@yield('title', 'Home')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">@yield('title', 'Home')</li>
                        </ol>
                    </div>
                </div>
                <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="aa-top-slider-single">
                <img src="{{ asset('images/slider/Milano.jpg') }}" alt="img">
                <!-- Top slider content -->
                <div class="aa-top-slider-content">
                    <div class="aa-property-header-inner">
                        <h2>@yield('title', 'Home')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">@yield('title', 'Home')</li>
                        </ol>
                    </div>
                </div>
                <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="aa-top-slider-single">
                <img src="{{ asset('images/slider/Bologna.jpeg') }}" alt="img">
                <!-- Top slider content -->
                <div class="aa-top-slider-content">
                    <div class="aa-property-header-inner">
                        <h2>@yield('title', 'Home')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">@yield('title', 'Home')</li>
                        </ol>
                    </div>
                </div>
                <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="aa-top-slider-single">
                <img src="{{ asset('images/slider/Ancona.jpeg') }}" alt="img">
                <!-- Top slider content -->
                <div class="aa-top-slider-content">
                    <div class="aa-property-header-inner">
                        <h2>@yield('title', 'Home')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">@yield('title', 'Home')</li>
                        </ol>
                    </div>
                </div>
                <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="aa-top-slider-single">
                <img src="{{ asset('images/slider/Roma.jpeg') }}" alt="img">
                <!-- Top slider content -->
                <div class="aa-top-slider-content">
                    <div class="aa-property-header-inner">
                        <h2>@yield('title', 'Home')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">@yield('title', 'Home')</li>
                        </ol>
                    </div>
                </div>
                <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="aa-top-slider-single">
                <img src="{{ asset('images/slider/Torino.jpg') }}" alt="img">
                <!-- Top slider content -->
                <div class="aa-top-slider-content">
                    <div class="aa-property-header-inner">
                        <h2>@yield('title', 'Home')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">@yield('title', 'Home')</li>
                        </ol>
                    </div>
                </div>
                <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
        </div>
    </div>
</section>
<!-- End slider  -->

<!-- Start content  -->
@yield('content')
<!-- End content  -->


<!-- Footer -->
<footer id="aa-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-footer-area">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="aa-footer-left">
                                <p>Ideato dal team di RentAdvisor</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="aa-footer-middle">
                                <a href="https://github.com/AndreaCiv/RentAdvisor"><i class="fa fa-github"></i></a>
                                <a href="https://www.univpm.it/Entra/"><i class="fa fa-university"></i></a>
                                <a href="https://www.ingegneria.univpm.it/"><i class="fa fa-gears"></i></a>
                                <a href="https://www.free-css.com/free-css-templates/page236/home-property"><i class="fa fa-html5"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="aa-footer-right">
                                <a href="{{ route('home') }}">Home</a>
                                <a href="{{ route('faq') }}">FAQ</a>
                                <a href="{{ route('contact') }}">Contatti</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

</body>
</html>
