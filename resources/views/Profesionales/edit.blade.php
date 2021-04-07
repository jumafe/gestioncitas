@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edicion de Profesionales</h1>
@stop

@section('content')
<form method="POST" action="/profesionales/{{$profesionales->id}}" >
    @csrf    
    @method('PUT')

    @if ($errors->any())
    <div class="col-md-12">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

  <div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input id="apellido" name="apellido" type="text" class="form-control" value="{{$profesionales->apellido}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$profesionales->nombre}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono1</label>
    <input id="telefono1" name="telefono1" type="text" class="form-control" value="{{$profesionales->telefono1}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono2</label>
    <input id="telefono2" name="telefono2" type="text" class="form-control" value="{{$profesionales->telefono2}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input id="email" name="email" type="text" class="form-control" value="{{$profesionales->email}}"/>
  </div>
 
  <div class="form-group">
    <label for="">Especialidad:</label>
    <select name="especialidad" class="form-control">
		@foreach($especialidades as $especialidad)
		<option value="{{$especialidad->id}}" {{($profesionales->especialidad===$especialidad->id)? 'selected':''}} > {{$especialidad->descripcion}} </option>
		@endforeach 
		</select>
    </div>
  <div class="mb-3">
    <label for="" class="form-label">Intervalos entre Turnos</label>
    <input id="intervalos" name="intervalos" type="time" class="form-control" value="{{$profesionales->intervalos}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad de  Sobreturnos</label>
    <input id="sobreturno" name="sobreturno" type="text" class="form-control" value="{{$profesionales->sobreturno}}"/>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">Cantidad de Sobreturnos Especiales</label>
    <input id="sobreturnoe" name="sobreturnoe" type="text" class="form-control" value="{{$profesionales->sobreturnoe}}"/>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">Cantidad de Prácticas</label>
    <input id="practicas" name="practicas" type="text" class="form-control" value="{{$profesionales->practicas}}"/>
  </div>
    
  <div class="form-group">
              <label for="">Estado:</label>
   <select class="form-control" id="estado" name="estado">
   <option value="Activo" @if($profesionales->estado=='Activo')selected @endif>Activo</option>
   <option value="Inactivo" @if($profesionales->estado=='Inactivo')selected @endif>Inactivo</option>
  </select>
  </div>
   <a href="/profesionales" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-sm m-2">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop