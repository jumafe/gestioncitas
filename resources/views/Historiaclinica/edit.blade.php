@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edición de Historia Clínica</h1>
@stop

@section('content')
<form method="POST" action="/historiaclinica/{{$historiaclinicas->id}}" >
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
    <input id="dia" name="dia" type="date" class="form-control" value="{{$historiaclinicas->dia}}"/>
    </div>
        <div class="form-group">
              <label for="">Paciente:</label>
              <select class="form-control" tabindex="7" name="paciente" aria-label="Default select example">
                @foreach($pacientes as $paciente)            
                <option value="{{$paciente->id}}"{{($historiaclinicas->paciente===$paciente->id)? 'selected':''}} >{{$paciente->apellido}} </option>
                @endforeach
            </select>
        </div> 
        <div class="mb-3">
           <label for="" class="form-label">Profesional</label>
           <select name="profesional" class="form-control">
	@foreach($profesionales as $profesional)
		<option value="{{$profesional->id}}"{{($historiaclinicas->profesional===$profesional->id)? 'selected':''}} >{{$profesional->apellido}} </option>
		@endforeach 
	</select>
  </div>
  <div class="form-group">
    <label for="">Especialidad:</label>
    <select name="especialidad" class="form-control">
		@foreach($especialidades as $especialidad)
		<option value="{{$especialidad->id}}"{{($historiaclinicas->especialidad===$especialidad->id)? 'selected':''}} > {{$especialidad->descripcion}} </option>
		@endforeach 
		</select>
    </div>
  <div class="form-group">
  <label for="">Diagnostico</label>
  <textarea class="form-control rounded-0"  name="diagnostico" id="diagnostico" rows="3" >{{$historiaclinicas->diagnostico}}</textarea>
</div>
  <div class="mb-3">
    <label for="" class="form-label">Observacion</label>
    <textarea id="observacion" name="observacion" class="form-control rounded-0" rows="3" >{{$historiaclinicas->observacion}}</textarea>
  </div> 
   <a href="/historiaclinica" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
   <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop