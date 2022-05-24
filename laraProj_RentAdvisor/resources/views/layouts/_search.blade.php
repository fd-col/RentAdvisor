
<script>
$(function(){
$('#tipologia').onChange(function(){
		$val= $('select[name="tipologia"]').value();
		switch($val){
			case 1: $("#appartamento").hide();
					$("#posti_letto").hide();
					break;
			case 2:	 $("#appartamento").hide();
					$("#posti_letto").show();
					break;
			default:  $("#appartamento").hide();
					$("#posti_letto").show();
					break;
		}
	});
})
</script> 
  <section id="aa-advance-search">
    <div class="container">
      <div class="aa-advance-search-area">
        <div class="form">
		{{ Form::open(array('route' => 'catalog', )) }}
         <div class="aa-advance-search-top">
            <div class="row">
              <div class="col-md-4">
                <div class="aa-single-advance-search">
                  {{ Form::text('titolo', 'Titolo', ['class' => 'search-input','id' => 'titolo']) }}
				                                  @if ($errors->first('titolo'))
                                    <ul>
                                        @foreach ($errors->get('username') as $message)
                                            <li class="richiesta">{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                </div>
              </div>
              <div class="col-md-2">
                <div class="aa-single-advance-search">
				{{Form::select('tipologia', array(
				  '0' => 'Alloggio',
				  '1' => 'Appartamento',
				'2' => 'Posto letto',), null, ['class' =>'tipologia', 'id'=>'tipologia'] ) }}
                </div>
              </div>

              <div class="col-md-2">
                 <div class="aa-single-advance-search">
				 {{ Form::select('tipologia', array(
				 '0' => 'Genere Preferito',
				 '1' => 'Maschio',
				 '2' => 'Femmina',))}}
              </div>
              </div>
              
              <div class="col-md-2">
                <div class="aa-single-advance-search">
                  <input class="aa-search-btn" type="submit" value="Search">
                </div>
              </div>
            </div>
          </div>
         <div class="aa-advance-search-bottom">
           <div class="row">
            <div class="col-md-3">
				<div class="aa-single-advance-search">
                  {{ Form::text('citta', 'Città', ['class' => 'search-input','id' => 'cap',]) }}
				    @if ($errors->first('citta'))
                        <ul>
                            @foreach ($errors->get('citta') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
			<div class="col-md-3">
				<div class="aa-single-advance-search">
                  {{ Form::text('zona_localizzazione', 'Zona', ['class' => 'search-input','id' => 'zona_localizzazione',]) }}
				    @if ($errors->first('zona_localizzazione'))
                        <ul>
                            @foreach ($errors->get('zona_localizzazione') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
		   </div>  
         </div>
		 <div class="aa-advance-search-bottom">
           <div class="row">
				<div class="col-md-0">
					<label>Caparra massima</label>
				</div>
				
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('caparra_max', '', ['class' => 'search-input','id' => 'caparra_max',]) }}
				    @if ($errors->first('caparra_max'))
                        <ul>
                            @foreach ($errors->get('caparra_max') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
		   </div>
		 </div>  
		 <div class="aa-advance-search-bottom">
           <div class="row">
				<div class="col-md-0">
					<label>Affitto massimo</label>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('affitto_max', '', ['class' => 'search-input','id' => 'affitto_max',]) }}
				    @if ($errors->first('affitto_max'))
                        <ul>
                            @foreach ($errors->get('affitto_max') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
		   </div>
		 </div>
		  <div class="aa-advance-search-bottom">
           <div class="row">
				<div class="col-md-0">
					<label>Periodo locazione:</label>
				</div>
				<div class="col-md-0">
				<label>Inizio</label>
				</div>
				<div class="col-md-2">
				
					<div class="aa-single-advance-search">
					
						{{ Form::date('locazione_inizio', '1990-01-01',['id' => 'locazione_inizio']) }}
                            @if ($errors->first('locazione_inizio'))
                                <ul>
                                    @foreach ($errors->get('locazione_inizio') as $message)
                                        <li class="richiesta">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
					</div>
				</div>
				<div class="col-md-0">
				<label>Fine</label>
				</div>
				<div class="col-md-2">
					<div class="aa-single-advance-search">
						{{ Form::date('locazione_fine', '1990-01-01',['id' => 'locazione_fine']) }}
                            @if ($errors->first('locazione_fine'))
                                <ul>
                                    @foreach ($errors->get('locazione_fine') as $message)
                                        <li class="richiesta">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
					</div>
				</div>
		   </div>
		 </div>
		 <div class="aa-advance-search-bottom">
           <div class="row">
				<div class="col-md-0">
					<label>Numero bagni</label>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('bagni', '', ['class' => 'search-input','id' => 'bagni',]) }}
				    @if ($errors->first('bagni'))
                        <ul>
                            @foreach ($errors->get('bagni') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
				<div class="col-md-0">
				<div class="aa-single-advance-search">
					<label>Numero posti letto totali</label>
				</div>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
					
						{{ Form::text('n_posti_letto_totali', '', ['class' => 'search-input','id' => 'n_posti_letto_totali',]) }}
				    @if ($errors->first('n_posti_letto_totali'))
                        <ul>
                            @foreach ($errors->get('n_posti_letto_totali') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
				<div class="col-md-0">
					<label>Piano</label>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('piano', '', ['class' => 'search-input','id' => 'piano',]) }}
				    @if ($errors->first('piano'))
                        <ul>
                            @foreach ($errors->get('piano') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
		   </div>
		  
		  </div>
        
		 <div class="aa-advance-search-bottom">
           <div class="row">
		   <div class="col-md-12">
		   {{Form::checkbox('fumatori', 'true')}}
				<label>Fumatori</label>
				{{Form::checkbox('parcheggio', 'true')}}
				<label>Parcheggio</label>
				{{Form::checkbox('wi_fi', 'true')}}
				<label>Wi-fi</label>
				{{Form::checkbox('ascensore', 'true')}}
				<label>Ascensore</label>
				</div>
		   </div>
		  </div>
		  <!-- parte solo appartamenti -->
		  <div class="aa-advance-search-bottom" id="appartamento" hidden>
			<div class="row">
				<div class="col-md-0">
					<label>Numero camere</label>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('numero_camere', '', ['class' => 'search-input','id' => 'numero_camere',]) }}
				    @if ($errors->first('numero_camere'))
                        <ul>
                            @foreach ($errors->get('numero_camere') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
				<div class="col-md-0">
					<label>Dimensioni appartamento</label>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('appartamento_min', 'Min', ['class' => 'search-input','id' => 'appartamento_min',]) }}
				    @if ($errors->first('appartamento_min'))
                        <ul>
                            @foreach ($errors->get('appartamento_min') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('appartamento_max', 'Max', ['class' => 'search-input','id' => 'appartamento_max',]) }}
				    @if ($errors->first('appartamento_max'))
                        <ul>
                            @foreach ($errors->get('appartamento_max') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
				<div class="col-md-2">
                <div class="aa-single-advance-search">
				{{ Form::select('tipologia_appartamento', array(
				  '0'=> 'Tipologia',
				  '1' => 'Appartamento',
				'2' => 'Casa indipendente',)) }}
                </div>
              </div>
			  </div>
			  
			  <div id="row" style="margin-top:25px;">
				<div id="col-md-12">
			  {{Form::checkbox('cucina', 'true')}}
				<label>Presenza cucina</label>
				{{Form::checkbox('locale_ricreativo', 'true')}}
				<label>Presenza locale ricreativo</label>
				</div>
				</div>
			</div>
		  
		  <!-- parte solo posti letto -->
		  <div class="aa-advance-search-bottom" id="posti_letto" hidden>
			<div class="row">
				<div class="col-md-0">
					<label>Letti nella camera</label>
				</div>
				<div class="col-md-1">
					{{ Form::text('letti_camera', '', ['class' => 'search-input','id' => 'letti_camera',]) }}
				    @if ($errors->first('letti_camera'))
                        <ul>
                            @foreach ($errors->get('letti_camera') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
				</div>
				<div class="col-md-0">
					<label>Dimensioni della camera</label>
				</div>
				<div class="col-md-1">
					{{ Form::text('dim_camera_min', 'Min', ['class' => 'search-input','id' => 'dim_camera_min',]) }}
				    @if ($errors->first('dim_camera_min'))
                        <ul>
                            @foreach ($errors->get('dim_camera_min') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
				</div>
				<div class="col-md-1">
					<div class="aa-single-advance-search">
						{{ Form::text('dim_camera_max', 'Max', ['class' => 'search-input','id' => 'dim_camera_max',]) }}
				    @if ($errors->first('dim_camera_max'))
                        <ul>
                            @foreach ($errors->get('dim_camera_max') as $message)
                                <li class="richiesta">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
					</div>
				</div>
				<div class="col-md-2">
					<div class="aa-single-advance-search">
					{{Form::select('tipologia_posto_letto', array(
						'0' => 'Tipologia',
						'1' => 'Camera singola',
					'2' => 'Camera condivisa'))}}
					</div>
				</div>
				</div>
				<div id="row" style="margin-top:25px;">
				<div id="col-md-12">
				{{ Form::checkbox('angolo_studio', 'true')}}
				<label>Presenza angolo studio</label>
				</div>
				</div>
			
		  </div>
		  {{Form::close()}}
        </div>
		
      </div>
    </div>
  </section>
  