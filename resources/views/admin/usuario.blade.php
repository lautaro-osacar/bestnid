@extends('admin.admin')

@section('admin-contenido')

<legend><center>Datos de {{$usuario->name}} {{$usuario->apellido}}</center></legend>

<div class="panel panel-default">
	<div class="panel-heading">Visualización de datos</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
  			
  			<legend>Datos Personales</legend>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Email:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->email}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Nombre:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->name}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Apellido:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->apellido}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Provincia:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->ciudad->provincia->nombre}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Ciudad:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->ciudad->nombre}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Domicilio:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->domicilio}}</label>
    			</div>
  			</div>
  			<br>
  			
  			<legend>Datos de la tarjeta</legend>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Nombre del propietario:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->tarjeta->nombre_propietario}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Número:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->tarjeta->numero}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Vencimiento:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->tarjeta->vencimiento}}</label>
    			</div>
  			</div>
  			<br>

  			<legend>Datos de la cuenta</legend>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">ID:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->id}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Fecha de creación:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">{{$usuario->created_at}}</label>
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="name" class="col-md-3 control-label">Es administrador:</label>
    			<div class="col-md-9">
      				<label class="form-control-static">
      					@if(isset($usuario->esAdmin->id))
      						SI
      					@else
      						NO
      					@endif
      				</label>
    			</div>
  			</div>

	</div>
</div>

@endsection

