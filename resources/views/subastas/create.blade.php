@extends('app')

@section('content')

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="{{ asset('/css/subasta.create.css') }}" rel="stylesheet">
<script src="{{ asset('/js/subasta_create.js') }}"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Subasta</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Error!</strong>  Se encontraron problemas en los registros:<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(['action'=>'SubastaController@store','class' => 'form-horizontal','files'=>true]) !!}
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						
						<legend>Nueva Subasta</legend>
						<div class="form-group">
							<label class="col-md-4 control-label">Título</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">
							</div>
						</div>
		
						<div class="form-group">
							<label class="col-md-4 control-label">Descripción</label>
							<div class="col-md-6">
								<textarea class="form-control" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Imágenes</label>
							<div class="col-md-6  imagenes" >
								<input id="imagen1" name="imagen1" type="file" class="filestyle">
								<!-- Los campos de imagen2 y imagen3 se crean dinamicamente desde javascript -->
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Categoría</label>
							<div class="col-md-6">
								<select name="categoria" class="btn" id="cat-create">
						          	<option value="0">Seleccionar</option>
						          	@foreach($categorias as $key => $categoria)
						          		<option value="{{$key}}">{{$categoria}}</option>
						          	@endforeach
						        </select>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cargar subasta
								</button>
							</div>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection