  
$(document).ready(function() {

  $("#d_ruta").hide();
  $("#btn_imprimir").hide();
  
  var solicitud = $('#e_solicitud');
  solicitud.bind( "click" , function () {
    
    var request = $.ajax({
      type: "post" ,
      dataType: 'html',
      url: "solicitud" ,
      //contentType: "application/json; charset=utf-8"
      data: get_datos()
    });
     
    request.done(function( msg ) {
      $("#formularioSol").hide();
      $("#mapa").hide();
      localStorage.setItem('ruta_sol' , directionsDisplay.getDirections().routes[0].overview_polyline.points );
      localStorage.setItem('ruta_latInicio' , directionsDisplay.getDirections().routes[0].legs[0].start_location.nb );
      localStorage.setItem('ruta_lonInicio' , directionsDisplay.getDirections().routes[0].legs[0].start_location.ob );
      localStorage.setItem('ruta_latFinal' , directionsDisplay.getDirections().routes[0].legs[0].end_location.nb );
      localStorage.setItem('ruta_lonFInal' , directionsDisplay.getDirections().routes[0].legs[0].end_location.ob );
      urlImpresion = document.URL.replace('usuario/solicitud' , 'impresion/')+msg;
      $( "#log" ).html( '<h3>Su solicitud ha sido enviada , desea imprimirla</h3><a href="'+urlImpresion+'" class="btn btn-large btn-warning" id="btn_si">Si</a><a href="'+document.URL.replace("/usuario/solicitud" , "")+'" class="btn btn-large btn-danger" id="btn_no">No</a>');
    });
    request.fail(function( jqXHR, textStatus ) {
      $( "#log" ).html( "No se pudo enviar su solicitud " );
    });
  });

  $('.form_fecha').datepicker({
    format: "yyyy-mm-dd",
    weekStart: 1,
    todayBtn: true,
    language: "es",
    beforeShowDay: $.noop,
    orientation: "top left",
    autoclose: true,
    todayHighlight: true
  });


  $('#d_ruta').on('click', function( evt ) {
      $("#d_ruta").hide();
      $("#mapa").show();
  });

  $('#click_ocultar_mapa').on('click', function(evt) {
      $("#mapa").hide();
      $("#d_ruta").show();
  });

  $('#print_velMax').bind( "click" , function () {
    var request = $.ajax({
      type: "get" ,
      url: 'impresion/velmax' ,
      data: { "cedula" : "121323rfddf"}
    });
     
    request.done(function( msg ) {

    });
    request.fail(function( jqXHR, textStatus ) {
      $( "#log" ).html( "No se pudo enviar su solicitud " );
    });
  });

});
