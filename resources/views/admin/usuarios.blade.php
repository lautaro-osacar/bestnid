@extends('admin.admin')

@section('admin-contenido')

<legend><center>Usuarios</center></legend>

<div id="filtro-usuarios">
	<div class="panel panel-default">
		<div class="panel-heading">Filtro de búsqueda de usuarios por fecha de creación</div>
			<div class="panel-body">
				{!! Form::open(['action'=>'UserController@find','class' => 'form-inline','id' => 'formCategoria']) !!}
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
</div>

@endsection
