@extends('layouts.panel')

@section('cabecera')

@stop
 
@section('contenido')
	@if ( count($solicitudes) > 0 )
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Motivo</td>
					<td>Fecha</td>
					<td>Vehiculo</td>
					<td>Estado</td>
				</tr>
			</thead>
			<tbody>
			@foreach($solicitudes as $solicitud)
				<tr>
					<td>{{ $solicitud->id }}</td>
					<td>{{ $solicitud->sol_motivo }}</td>
					<td>{{ $solicitud->sol_fecha }}</td>
					<td>
						@if ($solicitud->sol_id_vehiculo == null )
							No asignado
						@else
							{{ $solicitud->sol_id_vehiculo }}
						@endif
					</td>
					<td>
						 @if ($solicitud->sol_estado == null or $solicitud->sol_estado == false )
							No aprobado
						@else
							Aprobado
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@endif


@stop