@extends('adminlte::page')

@section('title', 'Gestión de Citas Médicas')

@section('content_header')
    <h1>Historia Clínica por Paciente</h1> 
    <h>Sólo se mostrarán los pacientes con Historia Clinica</h>
@stop

@section('content')

<form name="fvalida" action="ihistoriaclinica" method="GET"  onsubmit="return valida_envia(this)"  >
    @csrf

    <div class="form-group">
              <label for="">Paciente:</label>
              <input type="text" class="form-control" tabindex="1" name="paciente" />
          </div>
        
  <a href="historiaclinica/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
 <input name="accion" value="Buscar" type="submit" class="btn btn-primary btn-sm" tabindex="2"> </input>
 
</form>
</br>
</br>

<form action="historiaclinica" method="GET">
    @csrf    
  
<table id="historiaclinica" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>

  <th scope="col">id</th>
  <th scope="col">apellido</th>
  <th scope="col">celular</th>
  <th scope="col">Acciones</th>
 
  </tr>
  </thead>
  <tbody>
  
  @foreach ($pacientes as $paciente)
  <tr>  
  <td>{{$paciente->id}}</td>
  <td>{{$paciente->apellido}}</td>
  <td>{{$paciente->celular}}</td>
 
  <td>
        
     <button type="submit" name="paciente" value="{{$paciente->id}}" class="btn btn-primary btn-sm" tabindex="1">Acceder</button>     
        </a>
          
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
    $('#historiaclinica').DataTable({
        "lengthMenu": [ [50, -1], [50, "All"] ]});
    
} );
</script>


      
</script>

<script>
function valida_envia()
{
    if (document.fvalida.paciente.selectedIndex==0){
      alert("Seleccione el paciente a consultar.")
      document.fvalida.paciente.focus()
      return false;
    }
}
</script>

    
@stop