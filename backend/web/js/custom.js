$(function () {
    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green',
        increaseArea: '20%'
    });

    $('.moeda').maskMoney({
        'thousands': '.',
        'decimal': ','
    });
    $('.data').datepicker({
        language: 'pt-BR',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
    });

    $(".numero").keyup(function () {
        var $this = $(this);
        $this.val(er_replace(/[^0-9]+/g, '', $this.val()));
    });

    $('.data').inputmask("99/99/9999");
    $('.telefone').inputmask("(99) 9999-9999");
    $('.cep').inputmask("99999-999");
});


/*** FUNCTIONS ******/
function er_replace(pattern, replacement, subject) {
    return subject.replace(pattern, replacement);
}

function handleAjaxLink(e) {
    e.preventDefault();
    var
        $link = $(e.target),
        callUrl = $link.attr('href'),
        formId = $link.data('formId'),
        onDone = $link.data('onDone'),
        onFail = $link.data('onFail'),
        onAlways = $link.data('onAlways'),
        ajaxRequest;

    ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data: (typeof formId === "string" ? $('#' + formId).serializeArray() : null)
    });

    // Assign done handler
    if (typeof onDone === "string" && ajaxCallbacks.hasOwnProperty(onDone)) {
        ajaxRequest.done(ajaxCallbacks[onDone]);
    }

    // Assign fail handler
    if (typeof onFail === "string" && ajaxCallbacks.hasOwnProperty(onFail)) {
        ajaxRequest.fail(ajaxCallbacks[onFail]);
    }

    // Assign always handler
    if (typeof onAlways === "string" && ajaxCallbacks.hasOwnProperty(onAlways)) {
        ajaxRequest.always(ajaxCallbacks[onAlways]);
    }
}