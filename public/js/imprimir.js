

$(document).ready(function() {
	var imagen = "http://maps.googleapis.com/maps/api/staticmap?size=650x650&markers=color:green%7Clabel:A%7C"+localStorage.getItem( 'ruta_latInicio' )+","+localStorage.getItem( 'ruta_lonInicio' )+"&markers=color:red%7Ccolor:red%7Clabel:B%7C"+localStorage.getItem( 'ruta_latFinal' )+","+localStorage.getItem( 'ruta_lonFInal' )+"&path=enc:"+localStorage.getItem( 'ruta_sol' )+"&sensor=false"
	$('#mapa').attr('src', imagen);
	
 	$('#print').bind( "click" , function () {
            $( '.noPrint' ).hide();  
            var mode = 'iframe';
            var extraCss = "";
            var printBoth = false;
            var keepAttr = [];
            var headElements = '<meta charset="utf-8" />,<meta http-equiv="X-UA-Compatible" content="IE=edge"/>';
            var options = { mode : mode, popClose : close, extraCss : extraCss, retainAttr : keepAttr, extraHead : headElements };
            $( '#printable' ).printArea();
     });

});


