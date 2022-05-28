@extends('layouts.layout')

@section('title', 'Elimina FAQ')

@section('content')
    @isset($faq_da_eliminare)
        <!-- Content FAQ-->
        <section id="aa-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-contact-area">
                            <div class="aa-contact-bottom">
                                <div class="aa-title">
                                    <h2>Elimina la FAQ</h2>
                                    <span></span>
                                </div>
                                <div class="aa-contact-form">
                                    {{ Form::open(array('route' => 'conferma_elimina_faq', 'class' => 'contactform')) }}
                                    <p class="comment-form-author">
                                    {{ Form::label('domanda', 'Domanda') }}
                                    {{ Form::textarea('domanda', "$faq_da_eliminare->domanda", ['class' => 'input','id' => 'domanda', 'aria-required' => 'true', 'readonly' => 'true']) }}
                                    <p class="comment-form-comment">
                                    {{ Form::label('risposta', 'Risposta') }}
                                    {{ Form::textarea('risposta', "$faq_da_eliminare->risposta", ['class' => 'input','id' => 'risposta', 'aria-required' => 'true', 'readonly' => 'true']) }}

                                    {{ Form::text('id', "$faq_da_eliminare->id",['style' => 'display: none']) }}
                                    <h4>Sei sicuro di voler eliminare la FAQ?</h4>
                                    <p class="form-submit">
                                        {{ Form::submit('Elimina', ['class' => 'aa-browse-btn']) }}
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
