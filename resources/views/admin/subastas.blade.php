@extends('admin.admin')

@section('admin-contenido')
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/js/elements/estado.js') }}"></script>

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
	<div class="bs-example">
		<div class="alert alert-info fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>!</strong> Al borrar una subasta se borraran todal las ofertas,preguntas y respuestas de la misma.
		</div>
	</div>
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
									<td><a href="/subasta/{{$subasta->id}}">{{$subasta->titulo}}</a></td>
									<td class="estado">{{$subasta->estado}}</td>
									<td><a href="/admin/subastas/{{$subasta->id}}/ofertas/" class="btn btn-primary" role="button">Ver Ofertas</a></td>
									<td>Botón</td>
								</tr>
							@endforeach
					</table>			
		</div>
	</div>
@endif

@endsection