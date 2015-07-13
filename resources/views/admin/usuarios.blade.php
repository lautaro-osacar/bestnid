@extends('admin.admin')

@section('admin-contenido')

<legend><center>Usuarios</center></legend>

<div id="filtro-usuarios">
	<div class="panel panel-default">
		<div class="panel-heading">Filtro de búsqueda de usuarios por fecha de creación</div>
			<div class="panel-body">
				{!! Form::open(['action'=>'UserController@find','class' => 'form-inline']) !!}
				<div class="form-group">
					<label>Desde:</label>
					<input type="date" class="form-control" name="fecha_desde" value="{{ old('fecha_desde') }}">
					<label style="margin-left:15px">Hasta:</label>
					<input type="date" class="form-control" name="fecha_hasta" value="{{ old('fecha_hasta') }}">

				</div>
					<button style="margin-left:15px" type="submit" class="btn btn-primary" id="categoria-btn">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				{!! Form::close() !!}
			</div>
	</div>
</div>

@if(isset($usuarios))
	<div id="resultados-busqueda">
		<div class="panel panel-default">
			<div class="panel-heading">Filtro de búsqueda de usuarios por fecha de creación</div>
				<div class="panel-body">
					<table class="table usuarios-table">
						<tr class="col-guia">
							<td>Fecha</td>
							<td>Mail</td>
							<td>Datos</td>
							<td>Subastas</td>
							<td>Baja</td>
						</tr>
							@foreach($usuarios as $usuario)
								<tr>
									<td>{{$usuario->created_at}}</td>
									<td>{{$usuario->email}}</td>
									<td>Botón</td>
									<td>Botón</td>
									<td>Botón</td>
								</tr>
							@endforeach
					</table>			
		</div>
	</div>
@endif

@endsection
