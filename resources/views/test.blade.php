@extends('app')

@section('content')
	<div>Hola como va todo</div>
	
	@foreach($nombres as $nombre)
		<h2><a href="/nombres/{{$nombre->nombre}}">{{$nombre->nombre}}</a></h2>
	@endforeach

@endsection