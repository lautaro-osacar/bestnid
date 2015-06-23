@extends('app')

@section('content')
<link href="{{ asset('/css/find.css') }}" rel="stylesheet">

	<div class="container">
		<table class="table table-hover" "col-md-3">
			@foreach($subastas as $subasta)
				<tr class="active">
					<td>
						@if (!empty($subasta->fotos))
							<img src="{{ $subasta->fotos[0]->filePath}}" alt="" class="col-md-3" height='150px'>
						@else
							<img src="/images/sin foto.gif" alt="" class="col-md-3" height='150px'>
						@endif
						<div class="titulo"> <a style="font-size:x-large" href="/subasta/{{ $subasta->id }}">{{ $subasta->titulo }}</a> </div>
						<br>
						<categoria>{{ $subasta->categoria->nombre}}</categoria><br>
					<div class="fecha_fin"><fechafin style="color:#941919">Finaliza: </fechafin>{{ $subasta->fecha_fin}}	</div>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

