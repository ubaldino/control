<?php

class UsuarioController extends BaseController {
	

	public function __construct(){
        $this->beforeFilter('auth' );
    }

    public function ingreso( $id ){
    	$datos = array( 
	    	'id_usuario' => $id,
	    	'ingreso' => date('Y-m-d H:i:s')
	    	);
    	$usuario = PlanillaTrabajo::create( $datos );
    	return Redirect::to('/');
    }

    public function salida( $id ){

    	return "salida";
    }

	public function panel(){
    	return  View::make( 'usuarios.listar' , array( 'usuarios' => Usuario::all() ) );
	}

	public function index(){
    	return View::make( 'usuarios.listar' , array( 'usuarios' => Usuario::all() ) );
	}

	public function create(){
    	return View::make( 'usuarios.crear');
	}

	public function store(){
		$respuesta = Usuario::agregarUsuario( Input::all() );
	    // Dependiendo de la respuesta del modelo
	    // retornamos los mensajes de error con los datos viejos del formulario
	    // o un mensaje de éxito de la operación
	    if ($respuesta['error'] == true){
	      return Redirect::to('usuarios')->withErrors($respuesta['mensaje'] )->withInput();
	    }else{
	      return Redirect::to('usuarios')->with('mensaje', $respuesta['mensaje']);
	    }
	}

	public function show( $id ) {

		$usuario = Usuario::find( $id );
    	return View::make('usuarios.ver')->with('usuario', $usuario );
	}

	public function edit( $id ){
		$usuario = Usuario::find( $id );
	    return View::make( 'usuarios.editar' , array( 'usuario' => $usuario ) );
	}

	public function update( $id ){
		
	    $respuesta = Usuario::actualizarUsuario( $id , Input::all() );
	    
	    if ($respuesta['error'] == true){
	      return Redirect::to('usuarios/' . $id . '/edit')->withErrors($respuesta['mensaje'] )->withInput(Input::except('password'));
	    }else{
	      return Redirect::to('usuarios')->with('mensaje', $respuesta['mensaje']);
	    }
	}

	public function destroy($id){
	    $respuesta = array();
	    $usuario = Usuario::find( $id );
	    $usuario->delete();
	    $respuesta['mensaje'] = 'Usuario eliminado!';
	    $respuesta['error']   = false;
	    $respuesta['data']    = $usuario;
	    return Redirect::to('usuarios')->with('mensaje', $respuesta['mensaje']) ;

	}

}




