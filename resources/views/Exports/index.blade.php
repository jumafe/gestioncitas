@extends('adminlte::page')

@section('title', 'Gestión de Citas Médicas')

@section('content_header')
    <h1>Informes</h1> 
    <h>Exportaciones a Excel</h> 
    <br>
    <br>
 
    
@stop

@section('content')

<form name="fvalidaprof" action="exportar" method="GET" onsubmit="return valida_enviaprof(this)"  >
    @csrf

    <div class="form-group">
              <label for="">Profesional:</label>
              <h>Sólo se mostrarán los profesionales con calendario generado</h>
              <select class="form-control" tabindex="1" name="profesional" aria-label="Default select example">
              <option value="0">--Seleccione profesional--</option>
                @foreach($profesionales as $profesional)            
                <option value="{{$profesional->id}}">{{$profesional->apellido}}</option>
                @endforeach
            </select>
        </div>  
  
 <input name="accion" value="Turnos" type="submit" class="btn btn-sm btn-warning" tabindex="2"> </input>
</form>
<br>
<br>

<form name="fvalidapac" action="exportar" method="GET" onsubmit="return valida_enviapac(this)"  >
    @csrf

    <div class="form-group">
              <label for="">Paciente:</label>
              <h>Sólo se mostrarán los pacientes con historia clínica existente</h>
              <select class="form-control" tabindex="3" name="paciente" aria-label="Default select example">
              <option value="0">--Seleccione Paciente--</option>
                @foreach($pacientes as $paciente)            
                <option value="{{$paciente->id}}">{{$paciente->apellido}}</option>
                @endforeach
            </select>
        </div>  
 
  <input name="accion" value="HClinicas" type="submit" class="btn btn-sm btn-warning" tabindex="4"> </input>
</form>

<br>
<br>
<form name="fvalidaRango" action="exportar" method="GET" onsubmit="return valida_enviarango(this)"  >
    @csrf

    <div class="form-group">
              <label for="">Profesional:</label>
              <h>Sólo se mostrarán los profesionales con calendario generado</h>
              <select class="form-control" tabindex="5" name="profesional2" aria-label="Default select example">
              <option value="0">--Seleccione profesional--</option>
                @foreach($profesionales as $profesional)            
                <option value="{{$profesional->id}}">{{$profesional->apellido}}</option>
                @endforeach
            </select>
        </div>  

        <div class="form-group">
              <label for="">Tratamiento:</label>
              <h>Sólo se mostrarán los tratamientos utilizados en los turnos</h>
              <select class="form-control" tabindex="6" name="tratamiento" aria-label="Default select example">
              <option value="0">--Todos--</option>
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
              <label for="">Dia desde:</label>
              <input   name="diadesde" type="date" class="form-control" tabindex="7" name="diadesde"/>
          </div>
          <div class="form-group">
              <label for="">Dia hasta:</label>
              <input   name="diahasta" type="date" class="form-control" tabindex="8" name="diahasta"/>
          </div>
 
  <input name="accion" value="TurnoRango" type="submit" class="btn btn-sm btn-warning" tabindex="9"> </input>
</form>
<br>
<br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
function valida_enviaprof()
{
    if (document.fvalidaprof.profesional.selectedIndex==0){
      alert("Seleccione el profesional a consultar.")
      document.fvalidaprof.profesional.focus()
     
      return false;
    }
}
</script>

<script>
function valida_enviapac()
{
    if (document.fvalidapac.paciente.selectedIndex==0){
      alert("Seleccione el paciente a consultar.")
      document.fvalidapac.paciente.focus()
      return false;
    }
}
</script>


<script>
function valida_enviarango()
{
    if (document.fvalidaRango.profesional2.selectedIndex==0){
      alert("Seleccione el profesional a consultar.")
      document.fvalidaRango.profesional2.focus()
      return false;
    }
      if  (document.fvalidaRango.tratamiento.value.length==0){
      alert("Seleccione el tratamiento a consultar.")
      document.fvalidaRango.tratamiento.focus()
      return false;
    }
    if (document.fvalidaRango.diadesde.value.length==0){
      alert("Complete dia desde.")
      document.fvalidaRango.diadesde.focus()
      return false;
    }
    if (document.fvalidaRango.diahasta.value.length==0){
      alert("Complete dia hasta.")
      document.fvalidaRango.diahasta.focus()
      return false;
    }
    
}
</script>

    
@stop