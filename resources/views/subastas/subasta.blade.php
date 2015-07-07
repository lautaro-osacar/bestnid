@extends('app')

@section('content')

<link href="{{ asset('/css/subasta.view.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/js/elevatezoom-master/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('/js/subasta.view.js') }}"></script>


	<div class="container">
		<!-- MENSAJE DE SUBASTA CREADA -->
		@if (session('status'))
		    <div class="alert alert-success">
        		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ session('status') }}
    		</div>
		@endif

		<!-- MENSAJE DE SUBASTA INACTIVA -->
		@if ($subasta->estado != 'A')
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp;Esta subasta no esta activa!
			</div>
		@endif

	  	<div class="fixme"><legend><h2><center>{{$subasta->titulo}}</center></h2></legend></div>
	  	
	  	<div id="lado-izq">
			<div id="gal1-principal">
				@if (count($subasta->fotos)>0)
					<img id="zoom_01" src="{{ $subasta->fotos[0]->filePath }}" data-zoom-image="{{ $subasta->fotos[0]->filePath }}"/>
				@else
					<img src="/images/sin foto.gif" data-zoom-image="/images/sin foto.jpg"/>
				@endif
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
				@if (Auth::guest() or Auth::user()->id==$subasta->user_id or $subasta->estado!='A')
					<a href="#oferta-modal" class="btn btn-primary btn-lg btn-danger" role="button" id="ofertar-btn" data-toggle="modal" disabled>Ofertar</a>
				@else
					<a href="#oferta-modal" class="btn btn-primary btn-lg btn-danger" role="button" id="ofertar-btn" data-toggle="modal" data-backdrop="static">Ofertar</a>
				@endif
				<div class="modal fade" id="oferta-modal">
					<div class="modal-dialog modal-lg" id="oferta-dialog">
						<div class="modal-content">
							<div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								 <h5 class="modal-title" id="myModalLabel">&nbsp;</h5>
							</div>
							<div class="modal-body">
								@include('subastas.ofertar')
							</div>
						</div>
					</div>
				</div>

			</div>
			{{ $subasta->descripcion }}
		</div>
	</div>

	<div id="preg-rta">
		@include('subastas.subasta_preg')
	</div>

@endsection


