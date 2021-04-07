@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de dias inactivos por profesional</h1>
@stop

@section('content')
<form action="/feriado" method="POST">
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
              <label for="">dia:</label>
              <input type="date"  class="form-control" tabindex="1" name="dia" value="{{old('dia')}}">
          </div>
       
          <div class="form-group">
              <label for="">Descripcion:</label>
              <input type="text" class="form-control" tabindex="2" name="descripcion" value="{{old('descripcion')}}">
          </div>
      
      <a href="/feriado" class="btn btn-primary btn-sm btn-danger" tabindex="3">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm " tabindex="4">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop