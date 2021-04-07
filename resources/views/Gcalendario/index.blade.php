@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Generación de calendarios</h1>
@stop

@section('content')

<form id="" action="calendario" method="POST" > 
    @csrf

        
    @if ($errors->any())
        <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (session('status'))
            @if(session('status') == '1')
                <div class="alert alert-success">
                Generado satisfactoriamente !
                </div>
            @elseif(session('status') == '2')
                <div class="alert alert-danger">
                Calendario existente ! 
                </div>
            @elseif(session('status') == '3')
            <div class="alert alert-success">
                 Eliminado satisfactoriamente ! 
                </div>
            @else
            <div class="alert alert-danger">
                 Turnos existentes ! 
                </div>
            @endif
     @endif
  
    <div class="form-group">
              <label for="">Profesional:</label>
              <select class="form-control" tabindex="1" name="profesional" aria-label="Default select example">
              <option value="">--Seleccione profesional--</option>
                @foreach($profesionales as $profesional)            
                <option value="{{$profesional->id}}">{{$profesional->apellido}}</option>
                @endforeach
            </select>
        </div>
      
        <div class="form-group">
              <label for="">Mes:</label>
              <input type="month" class="form-control" tabindex="2" name="diadesde"/>
          </div>
            
      <div class="text-center">
      </div>

  <input name="accion" value="Procesar" type="submit" class="btn btn-sm btn-success" tabindex="3"> </input>
  <input name="accion" value="Eliminar" type="submit" class="btn btn-sm btn-danger" tabindex="4"> </input>
 
</form>
<tbody>
  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop