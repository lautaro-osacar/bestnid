@extends('app')

@section('content')
	<div>Listado de Personas</div>
	
	@foreach($personas as $persona)
		<li><a href={{ URL::route('personas.show', $persona->id)}}>{{$persona->nombre}}</a></li>
	@endforeach

@endsection