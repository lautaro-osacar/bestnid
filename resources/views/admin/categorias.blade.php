@extends('admin.admin')

@section('admin-contenido')

<link href="{{ asset('/css/perfil.subastas.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>

<legend><center>Categorias</center></legend>
<div id="categorias" class="col-md-12">
	<table class="table table-hover categorias-table">
		<tr class="col-guia">
			<td>Nombre</td>
			<td>Borrar</td>
		</tr>
		@foreach($categorias as $categoria)
			<tr class="active">
				<td>{{$categoria}}</td>
				<td><a href="#" class="btn btn-primary" role="button">Borrar</a></td>
			</tr>
		@endforeach
	</table>

@endsection
