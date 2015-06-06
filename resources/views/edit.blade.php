@extends('app')

@section('content')
	<h2> Editar Persona</h2>

	{!! Form::model($nombre,['method' => 'PATCH']) !!}

		<div class='form-group'>
			{!! Form::text('nombre') !!}
		</div>

		<div class='form-group'>
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection