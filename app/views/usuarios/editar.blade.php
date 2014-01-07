@extends('layouts.panel')
@section('contenido')
	<h3> Actualizar datos del usuario </h3>
  <div class="row marketing">

  	
  	{{--Form::open( array('url' => 'usuarios/'.$usuario->id ) )--}}
  	{{Form::model( $usuario , array('url' => 'usuarios/'.$usuario->id , 'method' => 'PUT' ) )}}
			
			@if(Session::get('mensaje'))
		 		<div class="alert alert-success">{{ Session::get('mensaje') }}</div>
			@endif
    
	    <div class="form-group">
			  {{Form::label('nombres','Nombres')}}
			  {{Form::text('nombres', Input::old('nombres') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_nombres , 'autocomplete'=>'off'))}}
			  {{Form::label('apellido_paterno','Apellido Paterno')}}
			  {{Form::text('apellido_paterno', Input::old('apellido_paterno') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_apellido_paterno , 'autocomplete'=>'off'))}}
			  {{Form::label('apellido_materno','Apellido Materno')}}
			  {{Form::text('apellido_materno', Input::old('apellido_materno') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_apellido_materno , 'autocomplete'=>'off'))}}
			  {{Form::label('genero','Genero')}}
			  {{Form::text('genero', Input::old('genero') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_genero , 'autocomplete'=>'off'))}}
			  {{Form::label('login','Login')}}
			  {{Form::text('login', Input::old('login') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_login , 'autocomplete'=>'off'))}}
			  {{Form::label('password','Password')}}
			  {{Form::text('password', Input::old('password') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_password , 'autocomplete'=>'off'))}}
			  {{Form::label('direccion','Dirección')}}
			  {{Form::text('direccion', Input::old('direccion') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_direccion , 'autocomplete'=>'off'))}}
			  {{Form::label('celular','Celular')}}
			  {{Form::text('celular', Input::old('celular') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_celular , 'autocomplete'=>'off'))}}
			  {{Form::label('telefono','Telefono')}}
			  {{Form::text('telefono', Input::old('telefono') , array( 'class'=>'form-control' , 'placeholder'=> $usuario->usu_telefono , 'autocomplete'=>'off'))}}
			</div>
      {{Form::submit( 'Guardar' , array('class' => 'btn btn-success' ) )}}
	  	{{Form::reset('Resetear' , array('class' => 'btn btn-default' ))}}
  	{{Form::close()}}
  </div>
@stop