@extends('app')

@section('content')

<link href="{{ asset('/css/perfil.css') }}" rel="stylesheet">

  <div id="navigation">
    <table class="table table-hover table-bordered" cellpadding="10">
    	<tr><td> Perfil </td></tr>
    	<tr><td> Subastas </td></tr>
    	<tr><td> Ofertas </td></tr>
   	</table>
  </div>

  <div id="perfil-contenido">
  <legend><center>Mi Perfil</center></legend>
  Hola, este es juancho el perro malo
  </div>

@endsection