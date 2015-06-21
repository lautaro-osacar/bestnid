@extends('app')

@section('content')

<link href="{{ asset('/css/subasta.view.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/js/elevatezoom-master/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('/js/subasta.view.js') }}"></script>

	<div class="container">
	  	<legend><h2><center>{{$subasta->titulo}}</center></h2></legend>
	  	<div id="lado-izq">
			<div id="gal1-principal">
				<img id="zoom_01" src="{{ $subasta->fotos[0]->filePath }}" data-zoom-image="{{ $subasta->fotos[0]->filePath }}"/>
			</div>
			<div id="gal1">
			@foreach($subasta->fotos as $key => $foto)
						<a href="#" data-image="{{ $foto->filePath }}" data-zoom-image="{{ $foto->filePath }}">
							<img id="zoom_01" src="{{ $foto->filePath }}"/>
						</a>
			@endforeach
			</div>
		</div>
		<div id="lado-der">
			<div id="ofertar">
				<a href="#" class="btn btn-primary btn-lg btn-danger" role="button" id="ofertar-btn">Ofertar</a>
			</div>
			{{ $subasta->descripcion }}
		</div>
	</div>


@endsection


