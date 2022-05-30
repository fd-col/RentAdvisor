<script>
    jQuery(function(){
        $('#tipologia').change(function(){
            $val= $('select[name="tipologia"]').val();
            switch($val){
                case 'appartamento': $("#appartamento").show();
                    $("#posti_letto").hide();
                    break;
                case 'posto_letto':	 $("#appartamento").hide();
                    $("#posti_letto").show();
                    break;
                default:  $("#appartamento").hide();
                    $("#posti_letto").hide();
                    break;
            }
        });
        $('#filter-button').click(function(){
            $('#filter-content').toggle('slow');
            $val=$('#filter-button').attr('class');
            if($val=='fa fa-2x fa-inverse fa-arrow-down')
                $('#filter-button').attr('class', 'fa fa-2x fa-inverse fa-arrow-up');
            else
                $('#filter-button').attr('class', 'fa fa-2x fa-inverse fa-arrow-down');
        })
    })
</script>
<section id="aa-advance-search">
    <div class="container">
        <div class="aa-advance-search-area">
            <div class="form">
                {{ Form::open(array('route' => 'catalog_filtered' )) }}
                <div class="aa-advance-search-top">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="aa-single-advance-search">
                                {{ Form::text('titolo', '', ['class' => 'search-input','id' => 'titolo', 'placeholder'=>'Parole chiave']) }}
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
                                  false => 'Alloggio',
                                  'appartamento' => 'Appartamento',
                                'posto_letto' => 'Posto letto',), null, ['class' =>'tipologia', 'id'=>'tipologia'] ) }}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="aa-single-advance-search">
                                {{ Form::select('genere', array(
                                false => 'Genere Preferito nell\'alloggio',
                                'M' => 'Maschio',
                                'F' => 'Femmina',))}}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="aa-single-advance-search">
                                {{Form::submit('CERCA' ,['class' => 'aa-search-btn'] )}}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="fa fa-2x fa-inverse fa-arrow-down" id="filter-button"></span>
                        </div>
                    </div>
                </div>
                <div id="filter-content" hidden>
                    <div class="aa-advance-search-bottom">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="aa-single-advance-search">
                                    {{ Form::text('citta', '', ['class' => 'search-input','id' => 'cap', 'placeholder'=> 'Città']) }}
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
                                    {{ Form::text('zona_localizzazione', '', ['class' => 'search-input','id' => 'zona_localizzazione', 'placeholder' => 'Zona di localizzazione']) }}
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

                                    {{ Form::date('locazione_inizio', '',['id' => 'locazione_inizio']) }}
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
                                    {{ Form::date('locazione_fine', '',['id' => 'locazione_fine']) }}
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
                                {{Form::checkbox('fumatori', true)}}
                                <label>Fumatori</label>
                                {{Form::checkbox('parcheggio', true)}}
                                <label>Parcheggio</label>
                                {{Form::checkbox('wi_fi', true)}}
                                <label>Wi-fi</label>
                                {{Form::checkbox('ascensore', true)}}
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
                                    {{ Form::text('appartamento_min', '', ['class' => 'search-input','id' => 'appartamento_min', 'placeholder' => 'Min']) }}
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
                                    {{ Form::text('appartamento_max', '', ['class' => 'search-input','id' => 'appartamento_max', 'placeholder'=>'Max']) }}
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
                                      false=> 'Tipologia',
                                      'appartamento' => 'Appartamento',
                                    'casa_indipendente' => 'Casa indipendente',)) }}
                                </div>
                            </div>
                        </div>

                        <div id="row" style="margin-top:25px;">
                            <div id="col-md-12">
                                {{Form::checkbox('cucina', true)}}
                                <label>Presenza cucina</label>
                                {{Form::checkbox('locale_ricreativo', true)}}
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
                                {{ Form::text('dim_camera_min', '', ['class' => 'search-input','id' => 'dim_camera_min', 'placeholder' => 'Min']) }}
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
                                    {{ Form::text('dim_camera_max', '', ['class' => 'search-input','id' => 'dim_camera_max', 'placeholder' => 'Max']) }}
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
                                        false => 'Tipologia',
                                        'camera_singola' => 'Camera singola',
                                    'camera_condivisa' => 'Camera condivisa'))}}
                                </div>
                            </div>
                        </div>
                        <div id="row" style="margin-top:25px;">
                            <div id="col-md-12">
                                {{ Form::checkbox('angolo_studio', true)}}
                                <label>Presenza angolo studio</label>
                            </div>
                        </div>

                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</section>
