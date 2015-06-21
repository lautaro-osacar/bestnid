@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="container">
			<div class="page-header">
					<center><h1>Subastas por finalizar</h1></center>
					<link href="{{ asset('/css/find.css') }}" rel="stylesheet">
					<div class="container">
					<table class="table table-hover" "col-md-3">
						@foreach($subastas as $subasta)
							<tr class="active">
								<td>
									<img src="{{ $subasta->fotos->first()->filePath}}" alt="" class="col-md-3" height='150px'>
									<div class="titulo"> <a style="font-size:x-large" href="/subasta/{{ $subasta->id }}">{{ $subasta->titulo }}</a> </div>
									<br>
									<categoria>{{ $subasta->categoria->nombre}}</categoria><br>
								<div class="fecha_fin"><fechafin style="color:#941919">Finaliza: </fechafin>{{ $subasta->fecha_fin}}	</div>
								</td>
							</tr>
						@endforeach
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
