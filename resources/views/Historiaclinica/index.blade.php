@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Historias clínicas</h1>
@stop

@section('content')
    

@foreach ($historiaclinicas as $historiaclinica) 
    <a href="historiaclinica/{{$historiaclinica->idpaciente}}" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
    @break; 
@endforeach


</br>
</br>
<table id="historiaclinica" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
  <th scope="col">dia</th>
  <th scope="col">profesional</th> 
  <th scope="col">observacion</th>
  <th scope="col">diagnostico</th>
  </tr>
  </thead>
  <tbody>
  
  @foreach ($historiaclinicas as $historiaclinica)
  <tr>  
  <td>{{$historiaclinica->id}}</td>
  <td>{{$historiaclinica->dia}}</td>
  <td>{{$historiaclinica->profesional}}</td>  
  <td>{{$historiaclinica->observacion}}</td>
  <td>{{$historiaclinica->diagnostico}}</td>
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
    var table = $('#historiaclinica').DataTable({
        
        "scrollX": false,
        "scrollY": false,
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
         "scrollCollapse": false,
         "ordering": false,
         "lengthMenu": [[50, -1], [50, "All"]],
     
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        
        initComplete: function() {
            this.api().columns([2]).every(function() {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                         
                            column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                        
                        
                    });
                    //Este codigo sirve para que no se active el ordenamiento junto con el filtro
                $(select).click(function(e) {
                    e.stopPropagation();
                });
                //===================

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                    
                });

            });
        },
        "aoColumnDefs": [
         { "bSearchable": false, "aTargets": [ 1 ] }
              
       ] 

     
      
    });
    //********Esta bendita linea hace la magia, adjusta el header de la tabla con el body 
   // table.columns.adjust();

    

});

      
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

