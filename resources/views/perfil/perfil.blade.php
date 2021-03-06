@extends('app')

@section('content')

<link href="{{ asset('/css/perfil.css') }}" rel="stylesheet">

  <div id="navigation">
    <table class="table table-hover table-bordered menu-table">
    	<tr><td><a class="link" href="/perfil/datos/{{ Auth::user()->id }}">Perfil</a></link></td></tr>
    	<tr><td><a class="link" href="{{ url('/perfil/subastas') }}">Subastas</a></link></td></tr>
    	<tr><td><a class="link" href="{{ url('/perfil/ofertas') }}">Ofertas</a></link></td></tr>
   	</table>
  </div>

  <div id="perfil-contenido">
  @yield('perfil-contenido')
  </div>

@endsection