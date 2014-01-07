@extends('layouts.panel')
@section('contenido')
	<h3>Usuarios</h3>
	{{ HTML::link('usuarios/create', 'Crear Usuario', array('class' => 'btn btn-small btn-success' )) }}
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Usuario</td>
			<td>Nombres</td>
			<td>Apellidos</td>
			<td>Acciones</td>
		</tr>
	</thead>
	<tbody>
	@foreach( $usuarios as $usuario )
		<tr>
			<td>{{ $usuario->usu_login }}</td>
			<td>{{ $usuario->usu_nombres }}</td>
			<td>{{ $usuario->usu_apellido_paterno }} {{ $usuario->apellido_materno }}</td>
			<td>	
				{{ Form::open(array('url' => 'usuario/' . $usuario->id .'/ingreso', 'class' => 'pull-left')) }}
					{{ Form::submit('Ingreso', array('class' => 'btn btn-success')) }}
				{{ Form::close() }}
				{{ Form::open(array('url' => 'usuario/' . $usuario->id .'/salida', 'class' => 'pull-left')) }}
					{{ Form::submit('Salida', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop