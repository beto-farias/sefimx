var contador = 0;
$('#js-orden').val("");

 $('#tiposvehiculosconfiguracion').change(function(){
     var valor = $(this).val();
    
     
     var divrowContent1 = "<div id='content-1' class='row'></div>";
     var divrowContent2 = "<div id='content-2' class='row'></div>";
     var divrowContent3 = "<div id='content-3' class='row'></div>";
     var divrowContent4 = "<div id='content-4' class='row'></div>";

     var divcol1 = "<div class='col-md-4' id='1'> </div>";
     var divcol2 = "<div class='col-md-4' id='2'> </div>";
     var divcol3 = "<div class='col-md-4' id='3'> </div>";

     contador++;
   



  if(valor == 2){
      var resultado = valor;
    $( "#content" ).append( divrowContent1 );
    $( "#content-1" ).append( divcol1+divcol2+divcol3 );
    $('#js-orden').clone().appendTo("#1").attr('id', 'js-orden'+contador++).val("2");
    $('#ejestiposvehiculos-tipoeje').clone().appendTo("#2").attr('id', 'ejestiposvehiculos-tipoeje'+contador);
    $('#ejestiposvehiculos-llantas').clone().appendTo("#3").attr('id', 'ejestiposvehiculos-llantas'+contador);
  }
  if(valor == 3){
    var resultado = valor;
  $( "#content" ).append( divrowContent2 );
  $( "#content-2" ).append( divcol1+divcol2+divcol3 );
  $('#js-orden').clone().appendTo("#1").attr('id', 'js-orden'+contador++).val(valor);
  $('#ejestiposvehiculos-tipoeje').clone().appendTo("#2").attr('id', 'ejestiposvehiculos-tipoeje'+contador+1);
  $('#ejestiposvehiculos-llantas').clone().appendTo("#3").attr('id', 'ejestiposvehiculos-llantas'+contador+1);
}
if(valor == 4){
    var resultado = valor;
  $( "#content" ).append( divrowContent3 );
  $( "#content-3" ).append( divcol1+divcol2+divcol3 );
  $('#js-orden').clone().appendTo("#1").attr('id', 'js-orden'+contador++).val(valor);
  $('#ejestiposvehiculos-tipoeje').clone().appendTo("#2").attr('id', 'ejestiposvehiculos-tipoeje'+contador+1);
  $('#ejestiposvehiculos-llantas').clone().appendTo("#3").attr('id', 'ejestiposvehiculos-llantas'+contador+1);
}
if(valor == 5){
    var resultado = valor;
  $( "#content" ).append( divrowContent4 );
  $( "#content-4" ).append( divcol1+divcol2+divcol3 );
  $('#js-orden').clone().appendTo("#1").attr('id', 'js-orden'+contador++).val(valor);
  $('#ejestiposvehiculos-tipoeje').clone().appendTo("#2").attr('id', 'ejestiposvehiculos-tipoeje'+contador+1);
  $('#ejestiposvehiculos-llantas').clone().appendTo("#3").attr('id', 'ejestiposvehiculos-llantas'+contador+1);
}
 
});




















