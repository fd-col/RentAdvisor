
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RentAdvisor | Contratto </title>

        <link rel="shortcut icon" href="{{ asset('images/home_house.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/contratto_paginazione.css') }}" type="text/css">

    <head>

    @isset($annuncio)
        @isset($locatore)
            @isset($locatario)
                @isset($data_inizio)
                    @isset($data_fine)
                        <body id="contratto">
                        <h1>MODELLO "C"</h1>
                        <h2>CONTRATTO DI LOCAZIONE DI NATURA TRANSITORIA PER LE ESIGENZE ABITATIVE DEGLI STUDENTI UNIVERSITARI</h2>
                        <h4><strong>ai sensi dell'art. 5, comma 2, della legge 9 dicembre 1998, n. 431</strong></h4>

                        <section>
                            <p>Il/La Sig. {{$locatore->nome}} {{$locatore->cognome}}, nato/a il {{$locatore->data_nascita}}
                                di seguito denominato/a locatore,
                                in qualità di proprietario della locazione menzionata.
                            <hr>CONCEDE IN LOCAZIONE<br>
                            al/alla Sig. {{$locatario->nome}} {{$locatario->cognome}}, nato/a il {{$locatario->data_nascita}}
                            di seguito denominato/a locatario
                            che accetta, per sé e suoi aventi causa,
                            @if($annuncio->tipologia == 'appartamento')
                                l'appartamento
                            @else
                                il posto letto
                            @endif
                            situato in {{ $annuncio->indirizzo }} n. civico
                            {{$annuncio->numero_civico}}, {{$annuncio->citta}} ({{$annuncio->provincia}}), piano
                            {{$annuncio->piano}}.
                            <hr>PERIODO DI LOCAZIONE<br>
                            Il contratto ha validità da data {{$data_inizio}} a data
                            {{$data_fine}}.
                            <hr>CONDIZIONI DI LOCAZIONE<br>
                            Il canone mensile concordato per la locazione è di {{$annuncio->canone_affitto}}€ e si richiede il versamento di
                            una caparra pari a {{$annuncio->caparra}}€.
                            </p>
                            <p>
                                LUOGO, DATA <br><br>
                                ______________________________
                            </p>
                            <p>
                                FIRMA DEL LOCATORE <br><br>
                                ______________________________<br><br>
                                FIRMA DEL LOCATARIO <br><br>
                                ______________________________
                            </p>
                        </section>
                        </body>
                    @endisset
                @endisset
            @endisset
        @endisset
    @endisset
</html>
