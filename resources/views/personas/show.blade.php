@extends('app')

@section('content')
	
	<div class='form-group'>
		<h2>Información de persona</h2>
	</div>

	<div class='form-group'>
		Nombre: {{$persona->nombre}}
	</div>

	<div class='form-group'>
		Edad: {{$persona->edad}}
	</div>	

	<div class='form-group'>
		<a href='/personas/{{$persona->id}}/edit'>{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}</a>
	</div>

@endsection