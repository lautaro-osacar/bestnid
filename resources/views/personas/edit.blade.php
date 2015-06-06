@extends('app')

@section('content')
	<h2> Editar Persona</h2>

	{!! Form::model($persona,['route' => array('personas.update', $persona->id), 'method' => 'PATCH']) !!}

		<div class='form-group'>
			{!!$persona->nombre!!}
		</div>

		<div class='form-group'>
			{!! Form::text('edad') !!}
		</div>

		<div class='form-group'>
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection