<!-- Start header section -->
<header id="aa-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-header-area">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="aa-header-left">
                                <div class="aa-telephone-no">
                                    <span class="fa fa-phone"></span>
                                    1234567890
                                </div>
                                <div class="aa-email hidden-xs">
                                    <span class="fa fa-envelope-o"></span> info@rentadvisor.com
                                </div>
                            </div>
                        </div>
                        @guest
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="aa-header-right">
                                <a href="{{ route('register') }}" class="aa-register">Registrati</a>
                                <a href="{{ route('login') }}" class="aa-login">Accedi</a>
                            </div>
                        </div>
                        @endguest
                        @can('isLocatore')
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="aa-header-right">
                                    <a href="" class="aa-login"><span class="fa fa-user"></span>  LOCATORE</a> |
                                    <a href="#" class="aa-login"><span class="fa fa-envelope"></span> </a>|
                                    <a href="#" class="aa-login"><span class="fa fa-edit"></span> </a>|
                                    <a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endcan
                        @can('isLocatario')
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="aa-header-right">
                                    <a href="" class="aa-login"><span class="fa fa-user"></span>  LOCATARIO</a> |
                                    <a href="#" class="aa-login"><span class="fa fa-envelope"></span> </a>|
                                    <a href="#" class="aa-login"><span class="fa fa-edit"></span> </a>|
                                    <a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endcan
                        @can('isAdmin')
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="aa-header-right">
                                    <a href="" class="aa-login"><span class="fa fa-user"></span>  ADMIN</a> |
                                    <a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End header section -->

<!-- Start menu section -->
<section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <!-- Text based logo -->
                <a class="navbar-brand aa-logo" href="{{ route('home') }}"> <span>RentAdvisor</span> </a>
                <!-- Image based logo -->
                <!-- <a class="navbar-brand aa-logo-img" href="home.blade.php"><img src="img/logo.png" alt="logo"></a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">

                    <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">HOME</a></li>

                    @can('isLocatario')
                        <li class="{{ Route::is('   DA MODIFICARE   ') ? 'active' : '' }}"><a href="#">RICERCA</a></li>
                        @isset($user)
                        <li class="{{ Route::is('visualizza_profilo_locatario') ? 'active' : '' }}"><a href="{{ route('visualizza_profilo_locatario', [$user->username]) }}">VISUALIZZA PROFILO</a></li>
                        @endisset
                    @else
                        <li class="{{ Route::is('catalog') ? 'active' : '' }}"><a href="{{ route('catalog') }}">CATALOGO</a></li>
                    @endcan

                    @can('isAdmin')
                        <li class="{{ Route::is('   DA MODIFICARE   ') ? 'active' : '' }}"><a href="#">STATISTICHE</a></li>
                    @endcan

                    @can('isLocatore')
                        <li class="{{ Route::is('   DA MODIFICARE   ') ? 'active' : '' }}"><a href="#">AREA PERSONALE</a></li>
                    @endcan

                    <li class="{{ Route::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}"> CONTATTI</a></li>
                    <li class="{{ Route::is('faq') ? 'active' : '' }}"><a href="{{ route('faq') }}">@can('isAdmin')MODIFICA @endcan FAQ</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</section>
<!-- End menu section -->
