@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Días inactivos por profesional</h1>
@stop

@section('content')
    
<a href="diainactivo/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
</br>
</br>

<table id="diainactivo" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
  <th scope="col">profesional</th>
  <th scope="col">diadesde</th>
  
  <th scope="col">descripcion</th>
  <th scope="col">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($diainactivos as $diainactivo)
  <tr>  
  <td>{{$diainactivo->id}}</td>
    <td>{{$diainactivo->apellido}}</td>
    <td>{{$diainactivo->diadesde}}</td>
   
    <td>{{$diainactivo->descripcion}}</td>
    <td>
    <form action="{{ route('diainactivo.destroy',$diainactivo->id) }}" method="POST" onsubmit="return confirmarEliminar()">
          <a href="/diainactivo/{{$diainactivo->id}}/edit" class="btn btn-primary btn-sm">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-primary btn-sm btn-danger">Delete</button>
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
    $('#diainactivo').DataTable({
        "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]});
    
} );
</script>

        

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