@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edicion de Feriados</h1>
@stop

@section('content')
<form method="POST" action="/feriado/{{$feriados->id}}" >
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
    <label for="" class="form-label">dia</label>
    <input id="dia" name="dia" type="date" class="form-control" value="{{$feriados->dia}}"/>
    </div>
   
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$feriados->descripcion}}"/>
  </div>
  

   <a href="/feriado" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop