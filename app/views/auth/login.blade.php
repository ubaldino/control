@extends('layouts.master')
@section('contenido')
	<div class="row marketing">
    {{ Form::open( array( 'url' => 'login' ) ) }}
        @if(Session::get('mensaje'))
          <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
      <div class="form-group">
        {{Form::label('usu_login','Login')}}
        {{Form::text('usu_login', Input::old('usu_login') , array( 'class'=>'form-control' , 'placeholder'=> 'Login' , 'autocomplete'=>'off', 'autofocus'=>'autofocus'))}}
        {{Form::label('usu_password','Password')}}
        {{Form::password('usu_password' , array( 'class'=>'form-control' , 'placeholder'=> 'Password' , 'autocomplete'=>'off') )}}
      </div>
      {{ Form::submit( 'Autentificarse' , array('class' => 'btn btn-success' ) ) }}
    {{ Form::close() }}
  </div>

@stop