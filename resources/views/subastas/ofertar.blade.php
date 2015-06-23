
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Oferta</div>
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

					{!! Form::open(['action'=>'SubastaController@store','class' => 'form-horizontal']) !!}
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						<legend>Nueva Oferta</legend>
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">Necesidad</label>
							<div class="col-md-6">
								<textarea class="form-control" name="necesidad" rows="4">{{ old('necesidad') }}</textarea>
							</div>
						</div>

						<div class="form-group">
						    <label class="col-md-4 control-label">Monto</label>
						    <div class="col-md-6">
							    <div class="input-group">
							      <div class="input-group-addon">$</div>
							      <input type="text" class="form-control" id="monto" placeholder="">
							      <div class="input-group-addon">.00</div>
							    </div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Enviar
								</button>
							</div>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
