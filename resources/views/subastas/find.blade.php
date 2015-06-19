@extends('app')

@section('content')
	<div class="container">
		<table class="table table-hover" "col-md-3">
			@foreach($subastas as $subasta)
				<tr class="active">
					<td>
						<img src="{{ $subasta->fotos->first()->filePath}}" alt="" class="col-md-3" height='150px' width='50%'>
						<h3><a href="/subasta/{{ $subasta->id }}">{{ $subasta->titulo }}</a></h3>
						<h5>{{ $subasta->categoria->nombre}}</h5>
					</td>
					<td><p style="color:#F0291D"> finaliza: </p><br>{{ $subasta->fecha_fin}}</td>	
				</tr>
			@endforeach
		</table>

	</div>
@endsection

