@extends('layouts.public')

@section('title', 'Home')


<!-- CONTENT -->
@section('content')
  <!-- Latest property -->
  <section id="aa-latest-property">
    <div class="container">
      <div class="aa-latest-property-area">
        <div class="aa-title">
          <h2>Annunci</h2>
          <span></span>
          <p>Ecco a te alcuni degli ultimi annunci inserito in RentAdvisor!</p>
        </div>
        <div class="aa-latest-properties-content">
          <div class="row">
            <div class="col-md-4">
              <article class="aa-properties-item">
                <a href="#" class="aa-properties-item-img">
                  <img src="{{ asset('images/item/1.jpg') }}" alt="img">
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
    </div>
  </section>
  <!-- / Latest property -->

  <!-- Service section -->
  <section id="aa-service">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-service-area">
            <div class="aa-title">
              <h2>Chi siamo</h2>
              <span></span>
              <p>Alcuni dei nostri servizi professionali per i clienti. </p>
            </div>
            <!-- service content -->
            <div class="aa-service-content">
              <div class="row">
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-home"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Affitti appartamenti</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-check"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Affitti posti letto</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-crosshairs"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Assistenza personale</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-bar-chart-o"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Trasparenza e Sicurezza</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Service section -->


  <!-- Our Agent Section-->
  <section id="aa-agents">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-agents-area">
            <div class="aa-title">
              <h2>I nostri agenti</h2>
              <span></span>
              <p>Affidati ai nostri agenti qualificati. Sapranno risolvere ogni tuo problema in base al campo di competenza relativo ad ognuno.</p>
            </div>
            <!-- agents content -->
            <div class="aa-agents-content">
              <ul class="aa-agents-slider">

                 <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="{{ asset('images/agents/agent-1.png') }}" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Andrea Civitarese</a></h4>
                      <span>Ingegnere</span>
                      <div class="aa-agent-social">
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="{{ asset('images/agents/agent-5.png') }}" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Francesco Camplese</a></h4>
                      <span>Notaio</span>
                      <div class="aa-agent-social">
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="{{ asset('images/agents/agent-3.png') }}" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Federico Colleluori</a></h4>
                      <span>Consulente</span>
                      <div class="aa-agent-social">
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="{{ asset('images/agents/agent-4.png') }}" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Paolo Cappelletti</a></h4>
                      <span>Ingegnere</span>
                      <div class="aa-agent-social">
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Our Agent Section-->
@endsection
