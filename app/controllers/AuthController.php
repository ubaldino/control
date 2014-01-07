<?php

class AuthController extends BaseController {
 
  public function getLogin(){
    return View::make('auth.login');
  }

  public function postLogin(){
  	
    $usuario  = Input::get('usu_login');
    $password = Input::get('usu_password');

  	$credencial = array(
  		'usu_login' => $usuario ,
  		'password' =>  $password
  	);

  	if ( Auth::attempt( $credencial ) ) {
      if (Auth::user()->usu_login == 'admin') {
  		  return Redirect::to('admin');
      } else {
        return Redirect::to('usuario');
      }
      
  	}
    else {
  		return Redirect::back()->withInput( Input::except('usu_password'));
  	}
  }

  public function logout(){
    Auth::logout();
    return Redirect::to('/');    
  }


}