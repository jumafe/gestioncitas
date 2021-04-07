@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Datos del Profesional</h1>
@stop

@section('content')

    @csrf
    <div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input  disabled id="apellido" name="apellido" type="text" class="form-control" value="{{$profesionales->apellido}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input  disabled id="nombre" name="nombre" type="text" class="form-control" value="{{$profesionales->nombre}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono1</label>
    <input  disabled id="telefono1" name="telefono1" type="text" class="form-control" value="{{$profesionales->telefono1}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono2</label>
    <input  disabled id="telefono2" name="telefono2" type="text" class="form-control" value="{{$profesionales->telefono2}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input  disabled id="email" name="email" type="text" class="form-control" value="{{$profesionales->email}}"/>
  </div>
 
  <div class="form-group">
    <label for="">Especialidad:</label>
    <select  disabled name="especialidad" class="form-control">
		@foreach($especialidades as $especialidad)
		<option value="{{$especialidad->id}}" {{($profesionales->especialidad===$especialidad->id)? 'selected':''}} > {{$especialidad->descripcion}} </option>
		@endforeach 
		</select>
    </div>
  <div class="mb-3">
    <label for="" class="form-label">Intervalos entre Trunos</label>
    <input  disabled id="intervalos" name="intervalos" type="text" class="form-control" value="{{$profesionales->intervalos}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad de Sobreturnos</label>
    <input disabled  id="sobreturno" name="sobreturno" type="text" class="form-control" value="{{$profesionales->sobreturno}}"/>
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Cantidad de Sobreturnos Especiales</label>
    <input disabled  id="sobreturnoe" name="sobreturnoe" type="text" class="form-control" value="{{$profesionales->sobreturnoe}}"/>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">Cantidad de Prácticas</label>
    <input disabled id="practicas" name="practicas" type="text" class="form-control" value="{{$profesionales->practicas}}"/>
  </div>
   
  <label for="" class="form-label">Estado</label>
   <select  disabled class="form-control" id="estado" name="estado">
   <option value="Activo" @if($profesionales->estado=='Activo')selected @endif>Activo</option>
   <option value="Inactivo" @if($profesionales->estado=='Inactivo')selected @endif>Inactivo</option>
  </select>
  </div> 
  <div class="mb-3">
  </div> 
       <a href="/profesionales" class="btn btn-primary btn-sm">Volver</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    
@stop