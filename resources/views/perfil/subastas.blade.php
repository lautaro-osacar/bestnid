@extends('perfil.perfil')

@section('perfil-contenido')

<link href="{{ asset('/css/perfil.subastas.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/js/elements/estado.js') }}"></script>

<legend><center>Subastas</center></legend>
<div id="mis-subastas" class="col-md-12">
	<table class="table table-hover table-bordered subastas-table">
		<tr class="col-guia">
			<td>Titulo</td>
			<td>Estado</td>
			<td>Fecha de inicio</td>
			<td>Fecha de finalizacion</td>
			<td>Ofertas Nuevas</td>
			<td>Ver Ofertas</td>
			<td>Cancelar</td>
		</tr>
		@foreach($mis_subastas as $subasta)
			<tr class="active">
				<td><a href="/subasta/{{$subasta->id}}">{{$subasta->titulo}}</a></td>
				<td class="estado">{{$subasta->estado}}</td>
				<td>{{$subasta->created_at}}</td>
				<td>{{$subasta->fecha_fin}}</td>
				<td>{{$subasta->cant_ofertas}}</td>
				<td><a href="#" class="btn btn-primary" role="button">Ver Ofertas</a></td>
				<td><a href="#" class="btn btn-primary" role="button">Cancelar</a></td>
			</tr>
		@endforeach
	</table>
		

</div>

@endsection
