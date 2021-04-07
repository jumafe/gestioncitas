@extends('adminlte::page')

@section('title', 'Gestión de Citas Médicas')

@section('content_header')
    <h1>Turnos diarios</h1>
    <table id="diahora" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
  </thead>
  <tbody>
  @foreach ($tdiahora as $tdiahora)
  <td>{{$tdiahora->dias}}<br> {{$tdiahora->horainicio}}<br> {{$tdiahora->horafin}}</td>
  @endforeach
  </tbody>
 </table>  
@stop

@section('content')

<a href="turno/create" class="btn btn-primary btn-sm btn-danger"> ALTA </a>
</br>
</br>

@if (session('status'))
            @if(session('status') == '1')
                <div class="alert alert-success">
                Guardado satisfactoriamente !
                </div>
            @elseif (session('status') == '2')
                <div class="alert alert-danger">
                Se excede el tipo de turno elegido !
                </div>
            @elseif (session('status') == '3')
                <div class="alert alert-danger">
                El día está inactivo ! 
                </div>
                @elseif (session('status') == '4')
                <div class="alert alert-danger">
                El día es feriado ! 
                </div>
                @elseif (session('status') == '5')
                <div class="alert alert-danger">
                Las horas no alcanzan para realizar este tratamiento ! 
                </div>
                @else
                <div class="alert alert-danger">
                El calendario no está generado para esa fecha ! 
                </div>
            @endif
@endif
  
<table id="turno" class="table table-striped shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
<tr height: 50px>
<th scope="col">id</th>
<th scope="col">hora</th>
  <th scope="col">dia</th>
  <th scope="col">tratamiento</th>
  <th scope="col">paciente</th>
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
  <td>{{$turno->paciente}}</td>
  <td>{{$turno->tipo}}</td>
   
   
  <td>
    <form action="/turno/{{$turno->id}}" method="POST">
    @csrf    
    @method('PUT')
          <a href="/turno/{{$turno->id}}/edit" class="btn btn-primary btn-sm">A</a> 
          <input name="accion" value="B" type="submit" class="btn btn-sm btn-danger"> </input>
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
    var table = $('#turno').DataTable({
       // "order": [[ 1,5,2, "desc" ]]
        "scrollX": false,
        "scrollY": false,
        "ordering": false,
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
         "scrollCollapse": false,
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

