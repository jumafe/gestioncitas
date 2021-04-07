@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Especialidades</h1>
@stop

@section('content')
<form action="/especialidades" method="POST">
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
          <div class="form-group">
              <label for="">Descripcion:</label>
              <input type="text" class="form-control" tabindex="1" name="descripcion" value="{{old('descripcion')}}">
          </div>
          <div>
          <label for="">Estado:</label>
          <select class="form-control" tabindex="2" name="estado" aria-label="Default select example">
          <option selected>--Seleccione estado--</option>
            <option value="Activo" {{old('estado')=="Activo" ? 'selected' :''}}>Activo</option>
            <option value="Inactivo"{{old('estado')=="Inactivo" ? 'selected' :''}}>Inactivo</option>
          </select>
         </div>
        
         </br>
          <a href="/especialidades" class="btn btn-primary btn-sm btn-danger" tabindex="3">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm " tabindex="4" >Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop