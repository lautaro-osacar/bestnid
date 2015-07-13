@extends('admin.admin')

@section('admin-contenido')

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


<legend><center>Ofertas de {{$subasta->titulo}}</center></legend>
@if (session('status'))
    <div class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ session('status') }}
	</div>
@endif
<<div id="ofertas" class="col-md-12">
	<table class="table table-bordered ofertas-table">
		<tr class="col-guia">
			<td>Estado</td>
			<td>Fecha</td>			
			<td>Necesidad</td>
			<td>Monto</td>
			<td>Borrar</td>
		</tr>
		@foreach($ofertas as $oferta)
			<!--  si finalizo la subasta y la oferta es ganadora, aparece en color verde -->
			@if($oferta->subasta->estado == 'F' AND $oferta->id == $oferta->subasta->oferta_ganadora)      
				<tr class="success">
				<td>Ganadora</td>
			<!--  si finalizo la subasta o esta inactiva aparece en gris¿?-->
			@elseif($oferta->subasta->estado == 'F' OR $oferta->subasta->estado == 'I')   
				<tr class="active">
				<td>No elegida</td>
				@else
					<tr>
						<td>Pendiente</td>
			@endif
				<td>{{$oferta->created_at}}</td>
				<td>
				<div id="{{$oferta->id}}" class='mostrado left'>{{$oferta->necesidad}}</div>
				<i id="{{$oferta->id}}" oferta="{{$oferta->id}}" class='left expandir glyphicon glyphicon-plus'></i>
    			<div id="{{$oferta->id}}" class="collapse escondido">{{$oferta->necesidad}}</div>
    			</td>
				<td>{{$oferta->monto}}</td>
				<td><center><a href="/admin/subastas/{{$subasta->id}}/ofertas/del/{{$oferta->id}}" class="btn btn-primary" role="button">Borrar</a></center></td>


			</tr>
		@endforeach
	</table>
		

</div>
		

</div>

@endsection