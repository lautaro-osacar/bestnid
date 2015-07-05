@extends('perfil.perfil')

@section('perfil-contenido')
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/js/subasta_ofertas.js') }}"></script>
<script src="{{ asset('/js/elements/estado.js') }}"></script>

<style>
.ofertas-table > tbody > tr > td {
  border: 1px solid #dddddd;
  border-right-width:0px;
  border-left-width:0px;
  text-align: center;
}

.ofertas-table > tbody > tr > td{
	text-align: center;
}

.mostrado {
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	max-width: 400px;
}
.escondido{
	text-align: left;
	max-width: 400px;
	word-wrap: break-word;
}
.left {
    float: left;
}
</style>


<legend><center>Mis ofertas</center></legend>
<div id="ofertas" class="col-md-12">
	<table class="table table-bordered ofertas-table">
		<tr class="col-guia">
			<td>Necesidad</td>
			<td>Monto</td>
			<td>Fecha</td>
			<td>Subasta</td>
			<td>Finalización de la subasta</td>
			<td>Estado de la subasta</td>
		</tr>
		@foreach($mis_ofertas as $oferta)
			@if($oferta->subasta->estado == 'F' AND $oferta->id == $oferta->subasta->oferta_ganadora)      <!--  si finalizo la subasta y la oferta es ganadora, aparece en color verde -->
				<tr class="success">
			@elseif($oferta->subasta->estado == 'F' OR $oferta->subasta->estado == 'I')   <!--  si finalizo la subasta o esta inactiva -->
				<tr class="active">
				@else
					<tr>
			@endif
				<td>
				<div id="{{$oferta->id}}" class='mostrado left'>{{$oferta->necesidad}}</div>
				<i id="{{$oferta->id}}" oferta="{{$oferta->id}}" class='left expandir glyphicon glyphicon-plus'></i>
    			<div id="{{$oferta->id}}" class="collapse escondido">{{$oferta->necesidad}}</div>
    			</td>
				<td>{{$oferta->monto}}</td>
				<td>{{$oferta->created_at}}</td>
				<td><a href="/subasta/{{$oferta->subasta_id}}">{{$oferta->subasta->titulo}}</a></td>
				<td>{{$oferta->subasta->fecha_fin}}</td>
				<td class="estado">{{$oferta->subasta->estado}}</td>
			</tr>
		@endforeach
	</table>
		

</div>

@endsection