@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Días de atención</h1>
@stop

@section('content')
    
<a href="tdiahora/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
</br>
</br>

<table id="tdiahora" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
  <th scope="col">profesional</th>
  <th scope="col">dia</th>
  <th scope="col">horainicio</th>
  <th scope="col">horafin</th>
  <th scope="col">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($tdiahora as $tdiahora)
  <tr>  
  <td>{{$tdiahora->id}}</td>
    <td>{{$tdiahora->apellido}}</td>
    <td>{{$tdiahora->dia}}</td>
    <td>{{$tdiahora->horainicio}}</td>
    <td>{{$tdiahora->horafin}}</td>
    <td>
    <form action="{{ route('tdiahora.destroy',$tdiahora->id) }}" method="POST" onsubmit="return confirmarEliminar()">
          <a href="/tdiahora/{{$tdiahora->id}}/edit" class="btn btn-primary btn-sm">Editar</a>         
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
    $('#tdiahora').DataTable({
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