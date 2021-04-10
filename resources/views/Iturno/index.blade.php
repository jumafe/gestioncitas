@extends('adminlte::page')

@section('title', 'Gestión de Citas Médicas')

@section('content_header')
    <h1>Agenda por Profesional</h1> 
    <h>Sólo se mostrarán los profesionales con calendario generado</h>
@stop

@section('content')

<table id="profesionales" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
  <th scope="col">apellido</th>
  <th scope="col">nombre</th>
  
  <th scope="col">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($profesionales as $profesionales)
  <tr>  
  <td>{{$profesionales->id}}</td>
    <td>{{$profesionales->apellido}}</td>
    <td>{{$profesionales->nombre}}</td>
    
    <td>

  <form name="" action="turno" method="GET" >
    @csrf 
  <button type="submit" name="profesional" value="{{$profesionales->id}}" class="btn btn-primary btn-sm" tabindex="1">Agenda</button>     
  <a href="turno/{{$profesionales->id}}" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
  </form>
  </td>   
  </tr>
  @endforeach
  </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>



<script>
$(document).ready(function() {
    $('#profesionales').DataTable({
        "lengthMenu": [ [50, -1], [50, "All"] ]});
    
} );
</script>


<!-- <script>
function valida_envia()
{
    if (document.fvalida.profesional.selectedIndex==0){
      alert("Seleccione el profesional a consultar.")
      document.fvalida.profesional.focus()
      return false;
    }
}
</script> -->

    
@stop