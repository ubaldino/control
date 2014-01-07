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
			<td>Rol</td>
			<td>Acciones</td>
		</tr>
	</thead>
	<tbody>
	@foreach( $usuarios as $usuario )
		<tr>
			<td>{{ $usuario->usu_login }}</td>
			<td>{{ $usuario->usu_nombres }}</td>
			<td>{{ $usuario->usu_apellido_paterno }} {{ $usuario->apellido_materno }}</td>
			<!-- $roles[ $usuario->usu_rol ] -->
			<td>{{ 'cargo' }}</td>
			<td>

				<a class="btn btn-small btn-success" href="{{ URL::to('usuarios/' . $usuario->id) }}">Ver</a>

				<a class="btn btn-small btn-info" href="{{ URL::to('usuarios/' . $usuario->id . '/edit') }}">Editar</a>
				{{ Form::open(array('url' => 'usuarios/' . $usuario->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop