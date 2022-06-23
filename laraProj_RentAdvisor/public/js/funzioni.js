function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");
    if (elem.attr('type') === 'file') {
        // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}
// Script per modificare la form di inserimento dell'annuncio in base al tipo di alloggio
jQuery(function(){
    $('#tipologia').change(function(){
        $val= $('select[name="tipologia"]').val();
        switch($val) {
            case 'appartamento':
                $('#tipologia_appartamento_fieldset').show('slow');
                $('#caratteristiche_appartamento_fieldset').show('slow');
                $('#tipologia_posto_letto_fieldset').hide('slow');
                $('#caratteristiche_posto_letto_fieldset').hide('slow');
                break;
            case 'posto_letto':
                $('#tipologia_appartamento_fieldset').hide('slow');
                $('#caratteristiche_appartamento_fieldset').hide('slow');
                $('#tipologia_posto_letto_fieldset').show('slow');
                $('#caratteristiche_posto_letto_fieldset').show('slow');
                break;
            default:
                $('#tipologia_appartamento_fieldset').hide('slow');
                $('#caratteristiche_appartamento_fieldset').hide('slow');
                $('#tipologia_posto_letto_fieldset').hide('slow');
                $('#caratteristiche_posto_letto_fieldset').hide('slow');

        }
    });
})

//  Script per modificare la form di inserimento dell'annuncio in base al tipo di alloggio anche al ricaricamento della pagina in caso di errore
$(document).ready(function(){  //serve a mantenere la form modificata
    $val= $('select[name="tipologia"]').val();
    switch($val) {
        case 'appartamento':
            $('#tipologia_appartamento_fieldset').show();
            $('#caratteristiche_appartamento_fieldset').show();
            $('#tipologia_posto_letto_fieldset').hide();
            $('#caratteristiche_posto_letto_fieldset').hide();
            break;
        case 'posto_letto':
            $('#tipologia_appartamento_fieldset').hide();
            $('#caratteristiche_appartamento_fieldset').hide();
            $('#tipologia_posto_letto_fieldset').show();
            $('#caratteristiche_posto_letto_fieldset').show();
            break;
        default:
            $('#tipologia_appartamento_fieldset').hide();
            $('#caratteristiche_appartamento_fieldset').hide();
            $('#tipologia_posto_letto_fieldset').hide();
            $('#caratteristiche_posto_letto_fieldset').hide();

    }
})

//Funzione alert elimina annuncio
jQuery(function(){
    $('#ancora_elimina_annuncio').click(function(evt){
        $var = confirm('Sei sicuro di voler eliminare l\'annuncio?');
        if ($var == true) {
            event.preventDefault();
            document.getElementById('elimina_annuncio_form').submit();
        } else {
            evt.preventDefault();
        }
    });
})



//Funzione comparsa form date contratto
jQuery(function(){
    $('a.ancora_form_contratto').click(function(evt){
        var string = "#form_contratto_".concat(evt.target.id);
        $(string).toggle('slow');
    });
})


