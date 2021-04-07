@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Turnos</h1>
@stop

@section('content')
<form action="/turno" method="POST">

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
    
    <div>
          <label for="">Tipo de Turno:</label>
          <select class="form-control" tabindex="1" name="tipo" aria-label="Default select example">
          <option selected>--Seleccione Tipo--</option>
            <option value="STurno" {{old('tipo')=="STurno" ? 'selected' :''}}>SobreTurno</option>
            <option value="STurnoE" {{old('tipo')=="STurnoE" ? 'selected' :''}}>Especial</option>
            <option value="Turno" {{old('tipo')=="Turno" ? 'selected' :''}}>Turno</option>
            <option value="Practicas" {{old('tipo')=="Practicas" ? 'selected' :''}}>Practicas</option>
          </select>
         </div>
         <div class="mb-3">
           <label for="" class="form-label" tabindex="2">Profesional</label>
           <select name="profesional" class="form-control">
         
           @foreach ($profesionales as $profesional)
                        <option value={{$profesional->id}} selected>{{ $profesional->apellido }}</option>
                   
                @endforeach
	</select>
  </div>
  <div class="form-group">
              <label for="">Tratamiento:</label>
              <select class="form-control" tabindex="3" name="tratamiento" aria-label="Default select example">
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
              <select class="form-control" tabindex="4" name="paciente" aria-label="Default select example">
              <option selected>--Seleccione Paciente--</option>
                @foreach($paciente as $paciente)            
                @if (old('paciente')==$paciente->id)
                        <option value={{$paciente->id}} selected>{{ $paciente->apellido }} {{ $paciente->nombre }}</option>
                    @else
                        <option value={{$paciente->id}} >{{ $paciente->apellido }} {{ $paciente->nombre }}</option>
                    @endif
                @endforeach
            </select>
        </div> 
        <div class="form-group">
              <label for="">Dia:</label>
              <input   name="dia" type="date" class="form-control" tabindex="5" name="dia" value="{{old('dia')}}"/>
          </div>
        <div class="form-group">
              <label for="">Hora:</label>
              <input   name="hora" type="time" class="form-control" tabindex="6" name="hora" value="{{old('hora')}}"/>
          </div>
          <a href="/turno" class="btn btn-primary btn-sm btn-danger" tabindex="7">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm " tabindex="8">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop