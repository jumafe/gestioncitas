@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edicion de Obras Sociales</h1>
@stop

@section('content')
<form method="POST" action="/obrasocial/{{$obrasocial->id}}" >
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
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$obrasocial->descripcion}}"/>
  </div>
 
  <div>
  <label for="" class="form-label">Estado</label>
   <select class="form-control" id="estado" name="estado">
   <option value="Activo" @if($obrasocial->estado=='Activo')selected @endif>Activo</option>
   <option value="Inactivo" @if($obrasocial->estado=='Inactivo')selected @endif>Inactivo</option>
  </select>
  </div>
  </br>
   <a href="/obrasocial" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop