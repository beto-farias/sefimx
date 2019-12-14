$("#js-cambiarllantas").on('click', function(){
var fecha = $('#adquisicionesvehiculos-fechaadquisicion').val();
var idVehiculo = $('#inventariovehiculos-idtipovehiculo').val();

//alert(fecha+" "+vehiculo);

$.ajax({
    url: baseUrl+"inventariovehiculos/montar-llantas?fech="+fecha+"&vehiculo="+idVehiculo,
    type: 'post',
});
});


