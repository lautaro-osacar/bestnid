@extends('perfil.perfil')

@section('perfil-contenido')

<legend><center>Mi Perfil</center></legend>
<form class="form-horizontal" role="form">
        
        <legend>Datos Personales</legend>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Email:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->email}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Nombre:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->name}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Apellido:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->apellido}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Provincia:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->ciudad->provincia->nombre}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Ciudad:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->ciudad->nombre}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Domicilio:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->domicilio}}</label>
          </div>
        </div>
        <br>
        
        <legend>Datos de la tarjeta</legend>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Nombre del propietario:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->tarjeta->nombre_propietario}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Número:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->tarjeta->numero}}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Vencimiento:</label>
          <div class="col-md-9">
              <label class="form-control-static">{{$user->tarjeta->vencimiento}}</label>
          </div>
        </div>
        <br>
</form>


@endsection
