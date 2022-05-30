@extends('layouts.layout')

@section('title', 'Statistiche')

@section('content')


    <section id="aa-contact">
        <div class="container">
            <div class="row">
                
                <div class="aa-title">
                    <h2>Pagina delle Statistiche</h2>
                    <span></span>
                </div>

                <fieldset style="border: 1px solid black; padding: 10px">    
                    <h3>&nbsp Scegli il periodo per il filtraggio :</h3>
                    <h4>&nbsp (se il periodo o la tipologia di locazione non vengono specificati si riferisce a tutti gli annunci del sito)<br><br></h4> 
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

                    <div class="col-md-0">
                        <label>Tipologia di alloggio: &nbsp</label>
                    </div>
                    <div class="aa-single-advance-search">
                    {{Form::select('tipologia', array('false' => 'Alloggio','appartamento' => 'Appartamento',
                    'posto_letto' => 'Posto letto',), null, ['class' =>'tipologia', 'id'=>'tipologia'] ) }}
                    </div>
                    <br>
                </fieldset>

                <div class="aa-contact-bottom"> <!-- da modicare il nome nel .css-->
                    <div class="aa-title">
                        <fieldset style="border: 1px solid black">
                        @isset($numero_annunci)
                        <h2><br>Numero di annunci</h2>
                            
                            <p>gli annunci pubblicati nel periodo scelto sono : </p> 
                            <h3>{{$numero_annunci}}</h3>

                            <h2>Numero di richieste</h2>
                            <p>gli appartamenti richiesti nel periodo scelto sono : </p>  
                            <h3>10</h3>

                            <h2>Alloggi affittati</h2>                           
                            <p>gli alloggi totali assegnati nel periodo scelto sono : </p>  
                            <h3>8</h3>
                        @endisset                                    
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

