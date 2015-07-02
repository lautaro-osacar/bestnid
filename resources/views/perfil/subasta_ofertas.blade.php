@extends('perfil.perfil')

@section('perfil-contenido')
<script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/js/subasta_ofertas.js') }}"></script>

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
.left {
    float: left;
}
.right {
    float: right;
}

</style>


<legend><center>Ofertas de una subasta</center></legend>
<div id="ofertas" class="col-md-12">
	<table class="table table-hover table-bordered ofertas-table">
		<tr class="col-guia">
			<td>Necesidad</td>
			<td>Fecha</td>
			<td>Elegir ganadora</td>
		</tr>
		@foreach($ofertas as $oferta)
			<tr class="active">
				<td>
				<div id="{{$oferta->id}}" class='mostrado left'>{{$oferta->necesidad}}</div>
				<i oferta="{{$oferta->id}}" class='left expandir glyphicon glyphicon-plus'></i>
    			<div id="{{$oferta->id}}" class="collapse">{{$oferta->necesidad}}</div>
    			</td>
				<td>{{$oferta->created_at}}</td>
				<td><a href="#" class="btn btn-primary" role="button">Elegir como ganadora</a></td>
		@endforeach
	</table>
		

</div>

@endsection