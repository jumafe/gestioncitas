@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Historia Clínica</h1>
@stop

@section('content')
<form action="/historiaclinica" method="POST">
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
    
    <div class="mb-3">
    <label for="" class="form-label">dia</label>
    <input id="dia" name="dia" type="date" class="form-control" tabindex="1" value="{{old('dia')}}"/>
    </div>
        <div class="form-group">
              <label for="">Paciente:</label>
              <select class="form-control" tabindex="2" name="paciente" aria-label="Default select example">
              <option selected>--Seleccione Paciente--</option>
                @foreach($pacientes as $paciente)            
                @if (old('paciente')==$paciente->id)
                        <option value={{$paciente->id}} selected>{{ $paciente->apellido }}-{{ $paciente->nombre }}</option>
                    @else
                        <option value={{$paciente->id}} >{{ $paciente->apellido }}-{{ $paciente->nombre }}</option>
                    @endif
                @endforeach
            </select>
        </div> 
        <div class="mb-3">
           <label for="" class="form-label">Profesional</label>
           <select name="profesional" class="form-control" tabindex="3">
           <option selected>--Seleccione Profesional--</option>
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
    <label for="">Especialidad:</label>
    <select name="especialidad" class="form-control" tabindex="4">
    <option value="">--Seleccione especialidad--</option>
		@foreach($especialidades as $especialidad)
    @if (old('especialidad')==$especialidad->id)
                        <option value={{$especialidad->id}} selected>{{ $especialidad->descripcion }}</option>
                    @else
                        <option value={{$especialidad->id}} >{{ $especialidad->descripcion }}</option>
                    @endif
			@endforeach 
		</select>
    </div>
  <div class="form-group">
  <label for="">Diagnostico</label>
  <textarea class="form-control rounded-0"  name="diagnostico" id="diagnostico" tabindex="5" rows="3" value="{{old('diagnostico')}}"></textarea>
</div>
  <div class="mb-3">
    <label for="" class="form-label">Observacion</label>
    <textarea id="observacion" name="observacion" class="form-control rounded-0" tabindex="6" rows="3" value="{{old('observacion')}}"> </textarea>
  </div> 
          <a href="/historiaclinica" class="btn btn-primary btn-sm btn-danger" tabindex="7">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm " tabindex="8">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop