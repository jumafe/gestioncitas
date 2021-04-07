@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')


<form name="fvalida" action="paciente" method="GET"  onsubmit="return valida_envia(this)"  >
    @csrf

    <div class="form-group">
              <label for="">Paciente:</label>
              <input type="text" class="form-control" tabindex="1" name="paciente" />
          </div>
 
  <a href="paciente/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
 <input name="accion" value="Buscar" type="submit" class="btn btn-primary btn-sm" tabindex="2"> </input>
 
</form>
</br>
</br>
    


<table id="paciente" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
  <th scope="col">apellido</th>
  <th scope="col">nombre</th>
  <th scope="col">dni</th>
  <th scope="col">telefono1</th>
   
 
  <th scope="col">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($pacientes as $paciente)
  <tr>  
  <td>{{$paciente->id}}</td>
    <td>{{$paciente->apellido}}</td>
    <td>{{$paciente->nombre}}</td>
    <td>{{$paciente->dni}}</td>
    <td>{{$paciente->telefono1}}</td>
      
   
  <td>
    <form action="{{ route('paciente.destroy',$paciente->id) }}" method="POST" onsubmit="return confirmarEliminar()">
          <a href="/paciente/{{$paciente->id}}/edit" class="btn btn-primary btn-sm">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-primary btn-sm btn-danger">Delete</button>
          <a href="/paciente/{{$paciente->id}}/" class="btn btn-primary btn-success btn-sm">Ampliar</a>
          </form> 
         </td>   
    </tr>
  @endforeach
  </tbody>
</table>
@stop

@section('css')
    
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#paciente').DataTable({
        "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]});
    
} );
</script>


<script>

  function confirmarEliminar()
  {
  var x = confirm("Estas seguro de Eliminar?");
  if (x)
     return true;
  else
     return false;
  }
 
</script>

@stop