@extends('admin.admin')

@section('admin-contenido')

<style>
.usuarios-table > tbody > tr > td {
  border: 1px solid #dddddd;
  border-right-width:0px;
  border-left-width:0px;
  text-align: center;
}

.usuarios-table > tbody > tr > td{
	text-align: center;
}
</style>

<legend><center>Usuarios</center></legend>

@if (session('status'))
    <div class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ session('status') }}
	</div>
@endif

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
			<div class="panel-heading">Resultados de la búsqueda</div>
				<div class="panel-body">
					<table class="table table-hover table-bordered usuarios-table">
						<tr class="col-guia">
							<td>Fecha de Alta</td>
							<td>Mail</td>
							<td>Datos</td>
							<td>Subastas</td>
							<td>Baja</td>
							<td>Privilegios</td>
						</tr>
							@foreach($usuarios as $usuario)
								<tr class="active">
									<td>{{$usuario->created_at}}</td>
									<td>{{$usuario->email}}</td>
									<td>
										<a href="/admin/usuario/{{$usuario->id}}" class="btn btn-primary" role="button">
											Ver Datos
										</a>
									</td>
									<td>
										<a href="/admin/usuario/{{$usuario->id}}" class="btn btn-primary" role="button">
											Ver Subastas
										</a>
									</td>
									<td>
										<a href="/admin/usuarios/del/{{$usuario->id}}" class="btn btn-primary" role="button" onclick="if(!confirm('Al borrar un usuario se borrarán sus subastas, preguntas, respuestas, ofertas y datos asociados. ¿Desea continuar?')){return false;};">
											Borrar
										</a>
									</td>
									<td>
										<a href="/admin/usuario/{{$usuario->id}}" class="btn btn-primary" role="button">
											Nombrar administrador
										</a>
									</td>
								</tr>
							@endforeach
					</table>			
		</div>
	</div>
@endif

@endsection
