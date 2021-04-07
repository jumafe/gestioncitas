@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Profesionales</h1>
@stop

@section('content')
    
<a href="profesionales/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
</br>
</br>

<table id="profesionales" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
  <th scope="col">apellido</th>
  <th scope="col">nombre</th>
  <th scope="col">telefono1</th>
  <th scope="col">telefono2</th>
  <th scope="col">email</th>

  
  <th scope="col">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($profesionales as $profesionales)
  <tr>  
  <td>{{$profesionales->id}}</td>
    <td>{{$profesionales->apellido}}</td>
    <td>{{$profesionales->nombre}}</td>
    <td>{{$profesionales->telefono1}}</td>
    <td>{{$profesionales->telefono2}}</td>
    <td>{{$profesionales->email}}</td>

    
    <td>
    <form action="{{ route('profesionales.destroy',$profesionales->id) }}" method="POST" onsubmit="return confirmarEliminar()">
          <a href="/profesionales/{{$profesionales->id}}/edit" class="btn btn-primary btn-sm">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-primary btn-sm btn-danger">Delete</button>
          <a href="/profesionales/{{$profesionales->id}}/" class="btn btn-primary btn-success btn-sm">Ampliar</a>
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
    $('#profesionales').DataTable({
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