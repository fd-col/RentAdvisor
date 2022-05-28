@extends('layouts.layout')

@section('title', 'Modifica FAQ')

@section('content')
    @isset($faq_da_modificare)
        <!-- Content FAQ-->
        <section id="aa-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-contact-area">
                            <div class="aa-contact-bottom">
                                <div class="aa-title">
                                    <h2>Modifica la FAQ</h2>
                                    <span></span>
                                </div>
                                <div class="aa-contact-form">
                                    {{ Form::open(array('route' => 'conferma_modifica_faq', 'class' => 'contactform')) }}
                                    <p class="comment-form-author">
                                        {{ Form::label('domanda', 'Domanda') }}
                                        {{ Form::textarea('domanda', "$faq_da_modificare->domanda", ['class' => 'input','id' => 'domanda', 'aria-required' => 'true']) }}
                                        @if ($errors->first('domanda'))
                                        <ul>
                                            @foreach ($errors->get('domanda') as $message)
                                                <li class="richiesta">{{ $message }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    <p class="comment-form-comment">
                                        {{ Form::label('risposta', 'Risposta') }}
                                        {{ Form::textarea('risposta', "$faq_da_modificare->risposta", ['class' => 'input','id' => 'risposta', 'aria-required' => 'true']) }}
                                        @if ($errors->first('risposta'))
                                            <ul>
                                                @foreach ($errors->get('risposta') as $message)
                                                    <li class="richiesta">{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                            @endif
                                    {{ Form::text('id', "$faq_da_modificare->id",['style' => 'display: none']) }}
                                    <p class="form-submit">
                                        {{ Form::submit('Modifica', ['class' => 'aa-browse-btn']) }}
                                    </p>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
@endsection
