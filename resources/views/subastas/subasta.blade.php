@extends('app')

@section('content')
	<div class="container">
		<div class="page-header">
	  		<center><h1>{{$subasta->titulo}}</h1></center>
		</div>
			@foreach($subasta->fotos as $foto)
				<img src="{{ $foto->filePath}}" alt=""  class="img-thumbnail" "col-md-3" height='100px' width='30%' float: "left" >
			@endforeach
			<h4>{{ $subasta->descripcion }}</h4>
		</div>

	</div>


@endsection


