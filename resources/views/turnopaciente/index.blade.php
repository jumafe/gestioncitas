@extends('adminlte::page')

@section('title', 'Gestión de Citas Médicas')

@section('content_header')
    <h1>Turnos del paciente</h1>
 
@stop

@section('content')

</br>
</br>
  
<table id="turnopaciente" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr>
<th scope="col">id</th>
<th scope="col">hora</th>
  <th scope="col">dia</th>
  <th scope="col">tratamiento</th>
  <th scope="col">profesional</th>
  <th scope="col">tipo</th>
   <th scope="col">Acciones</th>
  </tr>
  </thead>
  <tbody>
  
  @foreach ($turnos as $turno)
  <tr>  
  <td>{{$turno->id}}</td>
  <td>{{$turno->hora}}</td>
  <td>{{$turno->dia}}</td>
  <td>{{$turno->tratamiento}}</td>
  <td>{{$turno->apellido}}</td>
  <td>{{$turno->tipo}}</td>
   
   
  <td>
  <form action="/turnopaciente/{{$turno->id}}" method="POST">
    @csrf    
    @method('PUT')
          <input name="accion" value="Borrar" type="submit" class="btn btn-sm btn-danger"> </input>
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
    var table = $('#turnopaciente').DataTable({
       // "order": [[ 1,5,2, "desc" ]]
        "scrollX": false,
        "scrollY": false,
        "ordering": true,
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
         "scrollCollapse": false,
     
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
            this.api().columns([2,3,4,5]).every(function() {
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
    table.columns.adjust();

    

});

        

</script>
@stop

