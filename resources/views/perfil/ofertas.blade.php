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
	<table class="table table-hover table-bordered ofertas-table">
		<tr class="col-guia">
			<td>Necesidad</td>
			<td>Monto</td>
			<td>Fecha</td>
			<td>Subasta</td>
		</tr>
		@foreach($mis_ofertas as $oferta)
			<?php if($oferta->id == $oferta->subasta->oferta_ganadora){
				?>
				<tr class="success">
				<?php
			}elseif($oferta->subasta->estado == 'I') { 
				?>
				<tr class="active">
				<?php
				} else{
					?>
					<tr>
					<?php
				}
			?>
				<td>
				<div id="{{$oferta->id}}" class='mostrado left'>{{$oferta->necesidad}}</div>
				<i id="{{$oferta->id}}" oferta="{{$oferta->id}}" class='left expandir glyphicon glyphicon-plus'></i>
    			<div id="{{$oferta->id}}" class="collapse escondido">{{$oferta->necesidad}}</div>
    			</td>
				<td>{{$oferta->monto}}</td>
				<td>{{$oferta->created_at}}</td>
				<td><a href="/subasta/{{$oferta->subasta_id}}">{{$oferta->subasta->titulo}}</a></td>
			</tr>
		@endforeach
	</table>
		

</div>

@endsection