<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

  protected $table = 'usuario'; 
  protected $fillable = array("usu_nombres",
								"usu_apellido_paterno",
								"usu_apellido_materno",
								"usu_genero",
								"usu_login",
								"usu_password",
                                "usu_direccion",
								"usu_rol",
								"usu_celular",
								"usu_telefono"
							  );

   /*public function rol(){
        // relacion tabla->campo con  campo
        return $this->hasOne('UsuarioRol',  'id' , 'usu_rol' );
    }*/

  public static function actualizarUsuario( $id , $input ){
    
    $respuesta = array();
        
    // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
    $reglas =  array(
        'nombres'  => array('required', 'min:2'),  
    );
            
    $validator = Validator::make( $input , $reglas);
    
    // verificamos que los datos cumplan la validación 
    if ($validator->fails()){
        
        // si no cumple las reglas se van a devolver los errores al controlador 
        $respuesta['mensaje'] = $validator;
        $respuesta['error']   = true;
    } else {
        // en caso de cumplir las reglas se crea el objeto Vendedor
        $usuario = Usuario::find( $id );
        $usuario->usu_nombres = $input['nombres'];
        $usuario->usu_apellido_paterno = $input['apellido_paterno'];
        $usuario->usu_apellido_materno = $input['apellido_materno'];
        $usuario->save();

        //$usuario = static::create($input);        
        
        // se retorna un mensaje de éxito al controlador
        $respuesta['mensaje'] = 'Datos actualizados!';
        $respuesta['error']   = false;
        $respuesta['data']    = $usuario;
    }

    return $respuesta;
  }

  public static function eliminarUsuario( $id ){
    $respuesta = array();
    $usuario = Usuario::find( $id );
    $usuario->delete();
    $respuesta['mensaje'] = 'Usuario eliminado!';
    $respuesta['error']   = false;
    $respuesta['data']    = $usuario;
    return $respuesta;
  }

  public static function agregarUsuario( $input ){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        
        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'login'  => array('required', 'max:100'),  
            'password' => array('required', 'max:100'), 
        );
                
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        } else {
            // en caso de cumplir las reglas se crea el objeto Vendedor
            $usuario = new Usuario;
            $usuario->usu_login = $input['login'];
            $usuario->usu_password = $input['password'];
            $usuario->save();

            //$usuario = static::create($input);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Usuario creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $usuario;
        }     
        
        return $respuesta; 
    }

    public function getAuthIdentifier(){
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->usu_password;
    }

    public function getReminderEmail(){
        return $this->email;
    }
}
