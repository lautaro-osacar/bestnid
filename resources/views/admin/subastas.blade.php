@extends('admin.admin')

@section('admin-contenido')
<style>
.subastas-table > tbody > tr > td {
  border: 1px solid #dddddd;
  border-right-width:0px;
  border-left-width:0px;
  text-align: center;
}

.subastas-table > tbody > tr > td{
	text-align: center;
}
</style>

<legend><center>Subastas</center></legend>

<div id="filtro-subastas">
	<div class="panel panel-default">
		<div class="panel-heading">Filtro de búsqueda de subastas por fecha de creación</div>
			<div class="panel-body">
				{!! Form::open(['action'=>'SubastaController@findAdmin','class' => 'form-inline']) !!}
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
<br>
<br>
@if(isset($subastas))
	<div id="resultados-busqueda">
		<div class="panel panel-default">
			<div class="panel-heading">Resultados de la búsqueda</div>
				<div class="panel-body">
					<table class="table table-hover table-bordered subastas-table">
						<tr class="col-guia">
							<td style="width:150px">Fecha</td>
							<td>Titulo</td>
							<td>Estado</td>
							<td>Ver Ofertas</td>
							<td>Borrar</td>
						</tr>
							@foreach($subastas as $subasta)
								<tr class="active">
									<td>{{$subasta->created_at}}</td>
									<td>{{$subasta->titulo}}</td>
									<td>{{$subasta->estado}}</td>
									<td>Botón</td>
									<td>Botón</td>
								</tr>
							@endforeach
					</table>			
		</div>
	</div>
@endif

@endsection