@extends('layouts.layout')

@section('title', 'Profilo Studente')


<!-- CONTENT -->
@section('content')
    @isset($user)
        <!-- Start form section -->
    <!-- Le classi di stile utilizzate sono quelle della form di contatto in modo da non doverle rifare-->
    <section id="aa-contact">
                    <div class="aa-contact-area">
                        <div class="aa-contact-bottom">
                            <div class="aa-title">
                                <h2>Profilo</h2>
                                <span></span>
                                <p>I dati relativi al tuo profilo </p>
                            </div>
                            <div class="aa-contact-form">
                                <form class="contactform" action="" name="visualizza_profilo" method="get" enctype="multipart/form-data">
                                    <div class="aa-properties-content-body">
                                        <ul class="aa-properties-nav">
                                            <li>
                                                <div class="col-xs-6"> <!-- stile bootstrap -->
                                                    <div class="aa-single-field">
                                                        <label for="username">Username <span class="required">*</span></label>
                                                        <input type="text" size="30" required="required" aria-required="true" value="" name="username">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="nome">Nome <span class="required">*</span></label>
                                                        <input type="text" required="required" aria-required="true" value="" name="nome">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="cognome">Cognome <span class="required">*</span></label>
                                                        <input type="text" size="30" required="required" aria-required="true" value="" name="cognome">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input type="email" size="30" required="required" aria-required="true" value="" name="email">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="password">Password <span class="required">*</span></label>
                                                        <input type="text" size="30" name="password">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="conferma-password">Conferma Password <span class="required">*</span></label>
                                                        <input type="text" size="30" name="conferma-password">
                                                    </div>
                                                  </div>
                                            </li>
                                            <li>
                                                <div class="col-xs-6">
                                                    <div class="aa-single-field">
                                                        <label for="data_nascita">Data nascita <span class="required">*</span></label>
                                                        <input type="text" required="required" aria-required="true" value="" name="data_nascita">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="citta">Città<span class="required">*</span></label>
                                                        <input type="text" name="citta" id="citta" value="" size="30" maxlength="50" required="required">
                                                    </div>
                                                    <div class="aa-single-fieldd">
                                                        <label for="indirizzo">Indirizzo<span class="required">*</span></label>
                                                        <input type="text" name="indirizzo" id="indirizzo" value="" size="30" maxlength="100" required="required">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="cap">CAP<span class="required">*</span></label>
                                                        <input type="text" name="cap" id="cap" value="" size="30" maxlength="5" required="required">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="tel">Telefono<span class="required">*</span></label>
                                                        <input type="text" name="tel" id="tel" value="" size="30" maxlength="10" required="required">
                                                    </div>
                                                    <div class="aa-single-field">
                                                        <label for="gen">Genere<span class="required">*</span></label>
                                                        <input type="text" name="gen" id="gen" value="M/F/ND" size="30" maxlength="1" required="required">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" class="aa-browse-btn" value="Modifica">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
    </section>
    @endsection
