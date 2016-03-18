$(function () {
    $('.moeda').maskMoney({
        'thousands': '.',
        'decimal': ','
    });

    $('.data').datepicker();
    $('.telefone').inputmask("(99) 9999-9999");
});