@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de dias inactivos por profesional</h1>
@stop

@section('content')
<form action="/diainactivo" method="POST">
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
              <label for="">Profesional:</label>
              <select class="form-control" tabindex="1" name="profesional" aria-label="Default select example">
              <option value="">--Seleccione profesional--</option>
              @foreach ($profesionales as $profesional)
                    @if (old('profesional')==$profesional->id)
                        <option value={{$profesional->id}} selected>{{ $profesional->apellido }}</option>
                    @else
                        <option value={{$profesional->id}} >{{ $profesional->apellido }}</option>
                    @endif
                @endforeach
            </select>
        </div>
          <div class="form-group">
              <label for="">diadesde:</label>
              <input type="date"  class="form-control" tabindex="2" name="diadesde" value="{{old('diadesde')}}">
          </div>
       
          <div class="form-group">
              <label for="">Descripcion:</label>
              <input type="text" class="form-control" tabindex="3" name="descripcion" value="{{old('descripcion')}}">
          </div>
      
      <a href="/diainactivo" class="btn btn-primary btn-sm btn-danger" tabindex="4">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm " tabindex="5">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop