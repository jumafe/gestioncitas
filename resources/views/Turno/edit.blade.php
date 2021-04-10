@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Asignación de Turnos</h1>
@stop

@section('content')
<form method="POST" action="/turno/{{$turno->id}}" >
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

<div class="form-group">
              <label for="">Tratamiento:</label>
              <select class="form-control" tabindex="7" name="tratamiento" aria-label="Default select example">
              <option value="">--Seleccione tratamiento--</option>
                @foreach($tratamiento as $tratamiento)            
                @if (old('tratamiento')==$tratamiento->id)
                        <option value={{$tratamiento->id}} selected>{{ $tratamiento->descripcion }}</option>
                    @else
                        <option value={{$tratamiento->id}} >{{ $tratamiento->descripcion }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
              <label for="">Paciente:</label>
              <select class="form-control" tabindex="7" name="paciente" aria-label="Default select example">
              <option value="">--Seleccione paciente--</option>
                @foreach($paciente as $paciente)            
                @if (old('paciente')==$paciente->id)
                        <option value={{$paciente->id}} selected>{{ $paciente->apellido }}{{ $paciente->nombre }}</option>
                    @else
                        <option value={{$paciente->id}} >{{ $paciente->apellido }}{{ $paciente->nombre }}</option>
                    @endif
                @endforeach
            </select>
        </div> 
  
   <a href="/turno" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
   <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop