@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Pacientes</h1>
@stop

@section('content')
<form action="/paciente" method="POST">
    @csrf

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

    <div class="form-group">
              <label for="">Apellido:</label>
              <input type="text" class="form-control" tabindex="1" name="apellido" value="{{old('apellido')}}"/>
          </div>
          <div class="form-group">
              <label for="">Nombre:</label>
              <input type="text" class="form-control" tabindex="2" name="nombre" value="{{old('nombre')}}"/>
          </div>
          <div class="form-group">
              <label for="">Dni:</label>
              <input type="text" class="form-control" tabindex="3" name="dni"  value="{{old('dni')}}"/>
          </div>
          <div class="form-group">
              <label for="">Telefono1:</label>
              <input type="text" class="form-control" tabindex="4" name="telefono1" value="{{old('telefono1')}}"/>
          </div>
          <div class="form-group">
              <label for="">Telefono2:</label>
              <input type="text" class="form-control" tabindex="5" name="telefono2" value="{{old('telefono2')}}"/>
          </div>
          <div class="form-group">
              <label for="">Celular:</label>
              <input type="text" class="form-control" tabindex="6" name="celular" value="{{old('celular')}}"/>
          </div>
          <div class="form-group">
              <label for="">fnacimiento:</label>
              <input type="date" class="form-control" tabindex="7" name="fnacimiento" value="{{old('fnacimiento')}}"/>
          </div>
          <div class="form-group">
              <label for="">Email:</label>
              <input type="text" class="form-control" tabindex="8" name="email" value="{{old('email')}}"/>
          </div>
          <div class="form-group">
              <label for="">Obrasocial:</label>
              <select class="form-control" tabindex="9" name="osocial" aria-label="Default select example">
              <option value="">--Seleccione Obra Social--</option>
                @foreach($obrasociales   as $obrasocial)            
                    @if (old('osocial')==$obrasocial->id)
                        <option value={{$obrasocial->id}} selected>{{ $obrasocial->descripcion }}</option>
                    @else
                        <option value={{$obrasocial->id}} >{{ $obrasocial->descripcion }}</option>
                    @endif
                @endforeach
            </select>
        </div>
          <div class="form-group">
              <label for="">plan:</label>
              <input type="text" class="form-control" tabindex="10" name="plan" value="{{old('plan')}}"/>
          </div>
          <div class="form-group">
              <label for="">nrosocial:</label>
              <input type="text" class="form-control" tabindex="11" name="nrosocial" value="{{old('nrosocial')}}"/>
          </div>
          <div class="form-group">
              <label for="">domicilio:</label>
              <input type="text" class="form-control" tabindex="12" name="domicilio" value="{{old('domicilio')}}"/>
          </div>
          <div class="form-group">
              <label for="">observa:</label>
              <input type="text" class="form-control" tabindex="13" name="observa" value="{{old('observa')}}"/>
          </div>
          <div class="form-group">
              <label for="">obsclinica:</label>
              <input type="text" class="form-control" tabindex="14" name="obsclinica" value="{{old('obsclinica')}}"/>
          </div>
      
      <a href="/paciente" class="btn btn-primary btn-sm mt-2" tabindex="15">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm mt-2" tabindex="16">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop