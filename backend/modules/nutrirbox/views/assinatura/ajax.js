var ajaxCallbacks = {
    'calcularAssinatura': function (response) {
        $('.valoresCalculados').html(response.body);
    },
}