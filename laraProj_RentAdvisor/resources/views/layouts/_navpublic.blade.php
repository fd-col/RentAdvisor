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
                <!-- <a class="navbar-brand aa-logo-img" href="index.blade.php"><img src="img/logo.png" alt="logo"></a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                    <li class="active"><a href="{{ route('home') }}">HOME</a></li>
                    <li><a href="{{ route('catalog') }}">CATALOGO</a></li>
                    <li><a href="{{ route('contact') }}">CONTATTI</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</section>
<!-- End menu section -->
