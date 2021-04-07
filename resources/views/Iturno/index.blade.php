@extends('adminlte::page')

@section('title', 'Gestión de Citas Médicas')

@section('content_header')
    <h1>Agenda por Profesional</h1> 
    <h>Sólo se mostrarán los profesionales con calendario generado</h>
@stop

@section('content')


<form name="fvalida" action="turno" method="GET"  onsubmit="return valida_envia(this)"  >
    @csrf

    <div class="form-group">
              <label for="">Profesional:</label>
              <select class="form-control" tabindex="1" name="profesional" aria-label="Default select example">
              <option value="0">--Seleccione profesional--</option>
                @foreach($profesionales as $profesional)            
                <option value="{{$profesional->id}}">{{$profesional->apellido}}</option>
                @endforeach
            </select>
        </div>  
 
 
  <a href="turno/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
 <input name="accion" value="Buscar" type="submit" class="btn btn-primary btn-sm" tabindex="2"> </input>
 
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
function valida_envia()
{
    if (document.fvalida.profesional.selectedIndex==0){
      alert("Seleccione el profesional a consultar.")
      document.fvalida.profesional.focus()
      return false;
    }
}
</script>

    
@stop