@extends('layouts.layout')

@can('isAdmin')
    @section('title', 'Modifica FAQ')
@else
    @section('title', 'FAQ')
@endcan

@section('content')
    @isset($faq)
        <!-- Content FAQ-->
        <section id="aa-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-title">
                            <h2>FAQ</h2>
                            <p>Domande frequenti</p>
                            <span></span>
                        </div>
                        <fieldset style="border: 1px solid black; padding-top:40px;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="aa-blog-area">
                                    <ol>
                                        @foreach($faq as $faq_singola)
                                            <li>
                                                <h3>
                                                    {{$faq_singola->domanda}}

                                                </h3>
                                                @can('isAdmin')
                                                    <a href="{{ route('modifica_faq', [$faq_singola->id]) }}"><span class="fa fa-edit"> <ul><li>Modifica</li></ul></span></a>
                                                    <a href="{{ route('elimina_faq',[$faq_singola->id]) }}"><span class="fa fa-trash"> <ul><li>Elimina</li></ul></span></a>
                                                @endcan
                                                <p><br>{{$faq_singola->risposta}}</p>
                                            </li>
                                        @endforeach
                                    </ol>
                                    @can('isAdmin')
                                        <h3><a href="{{ route('aggiungi_faq') }}"><span class="fa fa-plus-square-o"></span> Aggiungi FAQ</a></h3>
                                        <p> </p>
                                    @endcan
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Content FAQ-->
    @endisset
@endsection
