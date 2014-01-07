@extends('layouts.panel')
 
@section('contenido')
  {{ HTML::link('usuarios', 'volver'); }}
    <div class="row marketing">
    <h3>Crear Usuario</h3>
    {{Form::open( array('url' => 'usuarios') )}}
      @if(Session::get('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
      @endif
    
      <div class="form-group">
        {{Form::label('login','Login')}}
        {{Form::text('login', Input::old('login') , array( 'class'=>'form-control' , 'placeholder'=> 'Login' , 'autocomplete'=>'off'))}}
      </div>
      @if( $errors->has('nombres') )
        <div class="alert alert-danger">
          @foreach( $errors->get('nombres') as $error )
            * {{ $error }}<br/>
          @endforeach
        </div>
      @endif
      <div class="form-group">
        {{Form::label('password','Password')}}
        {{Form::text('password', Input::old('password') , array( 'class'=>'form-control' , 'placeholder'=> 'Password' , 'autocomplete'=>'off'))}}
      </div>
      @if( $errors->has('apellido_paterno') )
        <div class="alert alert-danger">
          @foreach( $errors->get('apellido_paterno') as $error )
            * {{ $error }}<br/>
          @endforeach
        </div>
      @endif
      <div class="form-group">
      </div>
      {{Form::submit( 'Guardar' , array('class' => 'btn btn-success' ) )}}
      {{Form::reset('Resetear' , array('class' => 'btn btn-default' ))}}
    {{Form::close()}}
  </div>
@stop

