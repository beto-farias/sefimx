$("#entempresas-txt_telefono").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

        return false;
    }
});

$("#entempresas-num_codigo_postal").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

        return false;
    }
});