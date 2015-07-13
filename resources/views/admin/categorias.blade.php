@extends('admin.admin')

@section('admin-contenido')

<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>

<legend><center>Categorías</center></legend>

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

@if (session('status-error'))
    <div class="alert alert-danger">
		<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;{{ session('status-error') }}
	</div>
@endif

<div id="create-categoria">
	<center>
	{!! Form::open(['action'=>'CategoriasController@store','class' => 'form-inline','id' => 'formCategoria']) !!}
	<div class="form-group">
		<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nombre de la categoría">
	</div>
		<button type="submit" class="btn btn-primary" id="categoria-btn">Crear categoría</button>
	{!! Form::close() !!}
	</center>
</div>
<br>
<br>
<div id="categorias" class="col-md-12">
	<table class="table table-hover categorias-table">
		<tr class="col-guia active">
			<td>Categorias:</td>
			<td></td>
		</tr>
		@foreach($categorias as $categoria)
			<tr>
				<td>{{$categoria}}</td>
				<td><center><a href="/admin/categorias/del/{{$categoria}}" class="btn btn-primary" role="button">Borrar</a></center></td>
			</tr>
		@endforeach
	</table>

@endsection
