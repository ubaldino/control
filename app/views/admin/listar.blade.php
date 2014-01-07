@extends('layouts.master')
@section('contenido')
	<h3>Usuarios</h3>
  <div class="list-group">
  	@foreach( $usuarios as $usuario )
	  	<a href="" class="list-group-item ">{{$usuario->login}}</a>
		@endforeach
  </div>

  <div class="row marketing">
  	{{Form::open( array('url' => 'usuarios') )}}
			@if(Session::get('mensaje'))
		 		<div class="alert alert-success">{{Session::get('mensaje')}}</div>
			@endif
    
	    <div class="form-group">
			  {{Form::label('nombres','Nombres')}}
			  {{Form::text('nombres', Input::old('nombres') , array( 'class'=>'form-control' , 'placeholder'=> 'Nombres' , 'autocomplete'=>'off'))}}
	    </div>
	    @if( $errors->has('nombres') )
		    <div class="alert alert-danger">
		    	@foreach( $errors->get('nombres') as $error )
				  	* {{ $error }}<br/>
		    	@endforeach
		    </div>
			@endif
	    <div class="form-group">
			  {{Form::label('apellido_paterno','Apellido Paterno')}}
			  {{Form::text('apellido_paterno', Input::old('apellido_paterno') , array( 'class'=>'form-control' , 'placeholder'=> 'Apellido Paterno' , 'autocomplete'=>'off'))}}
			</div>
			@if( $errors->has('apellido_paterno') )
		    <div class="alert alert-danger">
		    	@foreach( $errors->get('apellido_paterno') as $error )
				  	* {{ $error }}<br/>
		    	@endforeach
		    </div>
			@endif
			<div class="form-group">
			  {{Form::label('apellido_materno','Apellido Materno')}}
			  {{Form::text('apellido_materno', Input::old('apellido_materno') , array( 'class'=>'form-control' , 'placeholder'=> 'Apellido Materno' , 'autocomplete'=>'off'))}}
			  {{Form::label('genero','Genero')}}
			  {{Form::text('genero', Input::old('genero') , array( 'class'=>'form-control' , 'placeholder'=> 'Genero' , 'autocomplete'=>'off'))}}
			  {{Form::label('login','Login')}}
			  {{Form::text('login', Input::old('login') , array( 'class'=>'form-control' , 'placeholder'=> 'Login' , 'autocomplete'=>'off'))}}
			  {{Form::label('password','Password')}}
			  {{Form::text('password', Input::old('password') , array( 'class'=>'form-control' , 'placeholder'=> 'Password' , 'autocomplete'=>'off'))}}
			  {{Form::label('direccion','Dirección')}}
			  {{Form::text('direccion', Input::old('direccion') , array( 'class'=>'form-control' , 'placeholder'=> 'Dirección' , 'autocomplete'=>'off'))}}
			  {{Form::label('celular','Celular')}}
			  {{Form::text('celular', Input::old('celular') , array( 'class'=>'form-control' , 'placeholder'=> 'Celular' , 'autocomplete'=>'off'))}}
			  {{Form::label('telefono','Telefono')}}
			  {{Form::text('telefono', Input::old('telefono') , array( 'class'=>'form-control' , 'placeholder'=> 'Telefono' , 'autocomplete'=>'off'))}}
			</div>
      {{Form::submit( 'Guardar' , array('class' => 'btn btn-success' ) )}}
  	{{Form::close()}}
  </div>
@stop