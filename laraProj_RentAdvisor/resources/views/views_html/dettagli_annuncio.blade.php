@extends('layouts.public')

@section('title', 'Dettagli Annuncio')

@section('content')
    @isset($annuncio)
        @isset($caratteristiche)
            @isset($locatore)

  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
               <img src="{{ asset('images/slider/1.jpg') }}" alt="img">
               <img src="{{ asset('images/slider/2.jpg') }}" alt="img">
               <img src="{{ asset('images/slider/3.jpg') }}" alt="img">
             </div>
             <div class="aa-properties-info">
               <h2>{{ $annuncio->titolo }}</h2>
               <span class="aa-price">{{ $annuncio->canone_affitto }}€</span>
                 <p>Caparra: {{$annuncio->caparra}}€</p>
               <p>{{ $annuncio->descrizione }}</p>
               <p>Tipologia: {{ str_replace('_', ' ', $annuncio->tipologia) }}</p>
               <p>Data inserimento annuncio: {{ $annuncio->data_inserimento }}</p>
               <h4>Servizi inclusi</h4>
                 <ul><table><tr><td><li><span class="fa fa-bed"></span> Posti letto totali nell'alloggio: {{ $annuncio->numero_posti_letto_totali_alloggio }}</li></td></tr>
                <tr><td><li>Numero bagni: {{ $annuncio->numero_bagni }}</li></td></tr>
                         @if($annuncio->fumatori == true)  <tr><td><li>Fumatori accetti</li></td> @else <tr><td><li>Fumatori non accetti</li></td></tr> @endif
                         @if($annuncio->parcheggio == true)<tr><td><li><span class="fa fa-car"></span> Parcheggio</li></td></tr> @endif
                         @if($annuncio->wi_fi == true)<tr><td><li><span class="fa fa-wifi"></span> Wi-Fi</li></td></tr> @endif
                         @if($annuncio->ascensore == true)<tr><td><li>Ascensore</li></td></tr>@endif
                     </table></ul>

                 @if($annuncio->tipologia == 'appartamento')
                     <h4>Caratteristiche appartamento</h4>
                     <ul><table>
                             <tr><td><li>Tipologia appartamento: {{str_replace('_', ' ',$caratteristiche->tipologia_appartamento)}}</li></td></tr>
                             <tr><td><li>Numero camere: {{$caratteristiche->numero_camere}}</li></td></tr>
                             <tr><td><li>Dimensioni appartamento: {{$caratteristiche->dimensioni_appartamento}}mq</li></td></tr>
                             @if($caratteristiche->presenza_cucina == true)<tr><td><li><span class="fa fa-fire"></span> Cucina</li></td></tr>@endif
                             @if($caratteristiche->presenza_locale_ricreativo == true)<tr><td><li>Locale ricreativo</li></td></tr>@endif
                     </table></ul>
                         @endif

                 @if($annuncio->tipologia == 'posto_letto')
                     <h4>Caratteristiche posto letto</h4>
                     <ul><table>
                             <tr><td><li>Tipologia camera: {{$caratteristiche->tipologia_posto_letto}}</li></td>
                             <tr><td><li>Dimensioni camera: {{$caratteristiche->dimensioni_camera}}mq</li></td></tr>
                             <tr><td><li>Letti nella camera: {{$caratteristiche->letti_nella_camera}}</li></td></tr>
                             @if($caratteristiche->presenza_angolo_studio == true)<tr><td><li><span class="fa fa-book"></span> Angolo studio</li></td></tr>@endif
                     </table></ul>
                         @endif


                 <h4>Condizioni di locazione</h4>
                 <p>Durata minima di locazione: {{$annuncio->durata_minima_locazione}} mesi</p>
                 @if($annuncio->genere_preferito != 'ND')<p>Genere preferito dei locatari: {{$annuncio->genere_preferito}}</p>@endif
                 @if(!is_null($annuncio->eta_preferita_min))<p>Età mimima locatari: {{$annuncio->eta_preferita_min}}</p>@endif
                 @if(!is_null($annuncio->eta_preferita_max))<p>Età massima locatari: {{$annuncio->eta_preferita_max}}</p>@endif
                 <p>Inizio disponibilità alloggio: {{$annuncio->periodo_disponibilita_inizio}}</p>
                 @if(!is_null($annuncio->periodo_disponibilita_fine))<p>Fine disponibilità alloggio: {{$annuncio->periodo_disponibilita_fine}}</p>@endif
                 <p>Indirizzo: {{$annuncio->indirizzo}},{{$annuncio->numero_civico}}, {{$annuncio->citta}} ({{$annuncio->provincia}}) {{$annuncio->cap}}</p>
                 <p>Zona di localizzazione: {{$annuncio->zona_di_localizzazione}}</p>
                 <p>Piano: {{$annuncio->piano}}</p>
               <h4>Mappa</h4>
               <iframe src="https://maps.google.com/maps?q={{str_replace(' ','%20',$annuncio->indirizzo)}},{{$annuncio->numero_civico}},{{$annuncio->cap}},{{$annuncio->citta}},{{$annuncio->provincia}}&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div>
            </div>
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
		  <aside class="aa-properties-sidebar">
			<div class="aa-properties-single-sidebar">
                <h3>Locatore</h3>
				<h4>{{$locatore->nome}} {{$locatore->cognome}}</h4>
				<p>e-mail: {{$locatore->email}}<br>
                    telefono: {{$locatore->telefono}}<br>
				</p>
			</div>
		  </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->
            @endisset
        @endisset
    @endisset
@endsection
