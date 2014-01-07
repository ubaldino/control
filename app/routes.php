<?php

/*
Route::get('/', array('before' => 'auth', function(){
    if ( Auth::user()->usu_login == 'admin') {
    	return Redirect::to('admin');
    } else {
    	return Redirect::to('usuario');
    }
}));
*/

Route::get('/', function(){
  return View::make( 'inicio' , array( 'usuarios' => Usuario::all() ) );   
});


Route::get(  'login' , array('uses' => 'AuthController@getLogin' , 'before' => 'guest') );
Route::post( 'login' , array('uses' => 'AuthController@postLogin' , 'before' => 'guest') );
Route::get(  'logout', array('uses' => 'AuthController@logout', 'before' => 'auth') );


Route::resource( 'usuarios' , 'UsuarioController' );
Route::get( 'usuario' , 'UsuarioController@panel' );

Route::post( 'usuario/{id}/ingreso' , 'UsuarioController@ingreso' );
Route::post( 'usuario/{id}/salida' , 'UsuarioController@salida' );

Route::get( 'admin', 'AdminController@panel' );

Route::get('test', function(){
	$html2 = <<<EOF
	<table style="background: green">
      <thead>
        <tr>
          <td>ID</td>
          <td>Fecha</td>
          <td>Velocidad Km/h</td>
          <td>Latitud</td>
          <td>Longitud</td>
          <td class='noPrint'>Accion</td>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>asdsada</td>
            <td>asdsada</td>
            <td>asdsada</td>
            <td>asdsada</td>
            <td>asdsada</td>
            <td class='noPrint'>
            ssdas
            </td>
          </tr>
      </tbody>
  </table>
EOF;
  //return PDF::load($html2, 'A4', 'portrait')->show();
date_default_timezone_set("America/La_Paz"); 
echo date('Y-m-d H:i:s');  
}); 



