@extends('admin.admin')

@section('admin-contenido')

<link href="{{ asset('/css/perfil.subastas.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>

<legend><center>Categorias</center></legend>

@if (session('status'))
    <div class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ session('status') }}
	</div>
@endif

<div id="create-categoria">
	{!! Form::open(['action'=>'CategoriasController@store','class' => 'form-horizontal','id' => 'formCategoria']) !!}
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<textarea id="categoria-nombre" name="categoria-nombre" rows="2"></textarea>
		<button type="submit" class="btn btn-primary" id="categoria-btn">Crear categoria</button>
	{!! Form::close() !!}
</div>
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
