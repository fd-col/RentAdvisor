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
                {{ Form::open(array('route' => 'statistiche_calcolate'))}}
                <fieldset style="border: 1px solid black; padding: 10px">
                    <h3>&nbsp Scegli il periodo per il filtraggio :</h3>
                    <h4>&nbsp (se il periodo o la tipologia di locazione non vengono specificati ci si riferisce a tutti gli annunci del sito)<br><br></h4>

                    <div class="col-md-0">
                        <label>Periodo :</label>
                    </div>
                    <div class="col-md-0">
                        <label>Inizio</label>
                    </div>
                    <div class="col-md-2">
                        <div class="aa-single-advance-search">
                            {{ Form::date('data_inizio_filtro', '',['id' => 'data_inizio_filtro']) }}
                                @if ($errors->first('data_inizio_filtro'))
                                    <ul>
                                        @foreach ($errors->get('data_inizio_filtro') as $message)
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
                            {{ Form::date('data_fine_filtro', '',['id' => 'data_fine_filtro']) }}
                                @if ($errors->first('data_fine_filtro'))
                                    <ul>
                                        @foreach ($errors->get('data_fine_filtro') as $message)
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
                        {{Form::select('tipologia', [false => 'Alloggio','appartamento' => 'Appartamento',
                        'posto_letto' => 'Posto letto'], ['class' =>'tipologia', 'id'=>'tipologia'] ) }}
                        <div style='margin-left:80px; display:inline'>
                            {{Form::submit('CERCA' ,['class' => 'aa-search-btn'] )}}
                        </div>
                    </div>
                </fieldset>
                {{ Form::close()}}
                <div class="aa-contact-bottom"> <!-- da modicare il nome nel .css-->
                    <div class="aa-title">
                        <fieldset style="border: 1px solid black">

                        <h2><br>Numero di annunci</h2>
                        @isset($numero_annunci)
                            <p>gli annunci pubblicati nel periodo scelto sono : </p>
                            <h3>{{$numero_annunci}}</h3>
                        @endisset
                        @isset($numero_richieste)
                            <h2>Numero di opzioni</h2>
                            <p>gli alloggi opzionati nel periodo scelto sono : </p>
                            <h3>{{$numero_richieste}}</h3>
                        @endisset
                        @isset($numero_contratti)
                            <h2>Alloggi affittati</h2>
                            <p>gli alloggi totali assegnati nel periodo scelto sono : </p>
                            <h3>{{$numero_contratti}}</h3>
                        @endisset
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

