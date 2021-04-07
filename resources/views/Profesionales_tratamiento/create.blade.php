@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Tratamientos por profesional</h1>
@stop

@section('content')
<form action="/profesionales_tratamiento" method="POST">
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
              <select class="form-control" tabindex="1" name="profesionales_id" aria-label="Default select example">
              <option value="">--Seleccione profesional--</option>
                @foreach($profesionales as $profesionales)            
                @if (old('profesionales_id')==$profesionales->id)
                        <option value={{$profesionales->id}} selected>{{ $profesionales->apellido }}</option>
                    @else
                        <option value={{$profesionales->id}} >{{ $profesionales->apellido }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
              <label for="">Tratamiento:</label>
              <select class="form-control" tabindex="2" name="tratamiento_id" aria-label="Default select example">
              <option value="">--Seleccione tratamiento--</option>
                @foreach($tratamiento as $tratamiento)            
                @if (old('tratamiento_id')==$tratamiento->id)
                        <option value={{$tratamiento->id}} selected>{{ $tratamiento->descripcion }}</option>
                    @else
                        <option value={{$tratamiento->id}} >{{ $tratamiento->descripcion }}</option>
                    @endif
                @endforeach
            </select>
        </div>
          <a href="/profesionales_tratamiento" class="btn btn-primary btn-sm mt-2" tabindex="3">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm mt-2" tabindex="4">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop