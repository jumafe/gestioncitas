@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Datos del Paciente</h1>
@stop

@section('content')

    @csrf
    <div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input disabled id="apellido" name="apellido" type="text" class="form-control" value="{{$pacientes->apellido}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input disabled id="nombre" name="nombre" type="text" class="form-control" value="{{$pacientes->nombre}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Dni</label>
    <input  disabled id="dni" name="dni" type="text" class="form-control" value="{{$pacientes->dni}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono1</label>
    <input  disabled id="telefono1" name="telefono1" type="text" class="form-control" value="{{$pacientes->telefono1}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono2</label>
    <input  disabled id="telefono2" name="telefono2" type="text" class="form-control" value="{{$pacientes->telefono2}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">celular</label>
    <input  disabled id="celular" name="celular" type="text" class="form-control" value="{{$pacientes->celular}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">fnacimiento</label>
    <input  disabled id="fnacimiento" name="fnacimiento" type="date" class="form-control" value="{{$pacientes->fnacimiento}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input  disabled id="email" name="email" type="text" class="form-control" value="{{$pacientes->email}}"/>
  </div>
  
  <div class="form-group">
    <label for="">Obra Social:</label>
    <select  disabled  name="osocial" class="form-control">
		@foreach($obrasociales as $obrasocial)
		<option value="{{$obrasocial->id}}" {{($pacientes->osocial===$obrasocial->id)? 'selected':''}} > {{$obrasocial->descripcion}} </option>
		@endforeach 
		</select>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Plan</label>
    <input  disabled id="plan" name="plan" type="text" class="form-control" value="{{$pacientes->plan}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">nrosocial</label>
    <input  disabled id="nrosocial" name="nrosocial" type="text" class="form-control" value="{{$pacientes->nrosocial}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">domicilio</label>
    <input  disabled id="domicilio" name="domicilio" type="text" class="form-control" value="{{$pacientes->domicilio}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">observa</label>
    <input  disabled id="observa" name="observa" type="text" class="form-control" value="{{$pacientes->observa}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">obsclinica</label>
    <input  disabled  id="obsclinica" name="obsclinica" type="text" class="form-control" value="{{$pacientes->obsclinica}}"/>
  </div>

  </div>
      
       <a href="/paciente" class="btn btn-primary btn-sm">Volver</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    
@stop