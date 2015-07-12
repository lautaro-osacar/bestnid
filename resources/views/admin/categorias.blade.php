@extends('admin.admin')

@section('admin-contenido')

<link href="{{ asset('/css/perfil.subastas.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>

<legend><center>Categorias</center></legend>
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error!</strong>  Se encontraron problemas en los registros:<br><br>
		<ul>
			@foreach ($errors->all() as $key => $error)
				<li id="error-{{$key}}">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (session('status'))
    <div class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ session('status') }}
	</div>
@endif

<div id="create-categoria">
	<center>
	{!! Form::open(['action'=>'CategoriasController@store','class' => 'form-inline','id' => 'formCategoria']) !!}
	<div class="form-group">
		<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nombre de la categoria">
	</div>
		<button type="submit" class="btn btn-primary" id="categoria-btn">Crear categoria</button>
	{!! Form::close() !!}
	</center>
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
