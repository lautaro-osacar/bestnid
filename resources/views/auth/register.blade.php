@extends('app')

@section('content')

<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('/js/register.js') }}"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
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

					<form class="form-horizontal" id="reg_form" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<legend>Datos personales</legend>
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Apellido</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Provincia</label>
							<div class="col-md-6">
								  {!! Form::select('provincia_id',array_merge(array('0'=>'Seleccionar'),$provincias), Input::old('provincias')) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ciudad</label>
							<div class="col-md-6">
								{!! Form::select('ciudad_id',array()) !!}
								<input type="hidden" name='ciudad_old' class="form-control" value="{{ old('ciudad_id') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Domicilio</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="domicilio" value="{{ old('domicilio') }}">
							</div>
						</div>

						<br>
						<legend>Tarjeta de crédito</legend>
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre del propietario</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre_propietario" value="{{ old('nombre_propietario') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Número</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="tarjeta_numero" value="{{ old('tarjeta_numero') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Fecha de vencimiento</label>
							<div class="col-md-6">
								<input type="month" class="form-control" name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Código</label>
							<div class="col-md-6">
								 <input type="text" style="width:90px" maxlength="3" size="3" class="form-control card_code" name="card_code" value="{{ old('card_code') }}">
								 <span class="help-block">Últimos 3 dígitos en el reverso de la tarjeta</span>
							</div>
						</div>

						<br>
						<legend>Datos de la cuenta</legend>
						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrarme!
								</button>
							</div>
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
