@extends('app')

@section('content')

<style>
div#admin-contenido{
  float: left;
  width: 85%;
  padding-left: 50px;
  padding-right: 50px;
}
</style>

<link href="{{ asset('/css/perfil.css') }}" rel="stylesheet">

  <div id="navigation">
    <table class="table table-hover table-bordered menu-table">
    	<tr><td><a class="link" href="{{ url('/admin/categorias') }}">Categorias</a></link></td></tr>
    	<tr><td><a class="link" href="{{ url('/admin/subastas') }}">Subastas</a></link></td></tr>
    	<tr><td><a class="link" href="{{ url('/admin/usuarios') }}">Usuarios</a></link></td></tr>
   	</table>
  </div>

  <div id="admin-contenido">
  @yield('admin-contenido')
  </div>

@endsection