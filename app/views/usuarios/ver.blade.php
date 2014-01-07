@extends('layouts.panel')
 
@section('contenido')
	{{ HTML::link('usuarios', 'Volver'); }}
	<h1>Usuario {{$usuario->id}}</h1>
  {{ $usuario->nombres .' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno }}
<br/>
  {{ $usuario->created_at }}
@stop

