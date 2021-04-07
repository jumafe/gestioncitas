@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Profesionales</h1>
@stop

@section('content')
<form action="/profesionales" method="POST">
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
              <label for="">Apellido:</label>
              <input type="text" class="form-control" tabindex="1" name="apellido" value="{{old('apellido')}}"/>
          </div>
          <div class="form-group">
              <label for="">Nombre:</label>
              <input type="text" class="form-control" tabindex="2" name="nombre" value="{{old('nombre')}}"/>
          </div>
          <div class="form-group">
              <label for="">Telefono1:</label>
              <input type="text" class="form-control" tabindex="3" name="telefono1" value="{{old('telefono')}}"/>
          </div>
          <div class="form-group">
              <label for="">Telefono2:</label>
              <input type="text" class="form-control" tabindex="4" name="telefono2" value="{{old('telefono2')}}"/>
          </div>
          <div class="form-group">
              <label for="">Email:</label>
              <input type="text" class="form-control" tabindex="5" name="email" value="{{old('email')}}"/>
          </div>
   
          <div class="form-group">
              <label for="">Especialidad:</label>
              <select class="form-control" tabindex="6" name="especialidad" aria-label="Default select example">
              <option value="">--Seleccione especialidad--</option>
                @foreach($especialidades as $especialidades)            
                @if (old('especialidad')==$especialidades->id)
                        <option value={{$especialidades->id}} selected>{{ $especialidades->descripcion }}</option>
                    @else
                        <option value={{$especialidades->id}} >{{ $especialidades->descripcion }}</option>
                    @endif
                @endforeach
            </select>
        </div>
             <div class="form-group">
              <label for="">Intervalos entre turnos:</label>
              <input type="time" class="form-control" tabindex="7" name="intervalos" value="{{old('intervalos')}}"/>
          </div>

          <div class="form-group">
              <label for="">Cantidad de Sobreturnos:</label>
              <input type="text" class="form-control" tabindex="8" name="sobreturno" value="{{old('sobreturno')}}"/>
          </div>
        
          <div class="form-group">
              <label for="">Cantidad de Sobreturnos Especiales:</label>
              <input type="text" class="form-control" tabindex="9" name="sobreturnoe" value="{{old('sobreturnoe')}}"/>
          </div>
        
          <div class="form-group">
              <label for="">Cantidad de Prácticas:</label>
              <input type="text" class="form-control" tabindex="10" name="practicas" value="{{old('practicas')}}"/>
          </div>
         
          
          <div class="form-group">
              <label for="">Estado:</label>
      <select class="form-control pb-0" tabindex="11" name="estado" aria-label="Default select example">
      <option selected>--Seleccione estado--</option>
      <option value="Activo" {{old('estado')=="Activo" ? 'selected' :''}}>Activo</option>
      <option value="Inactivo"{{old('estado')=="Inactivo" ? 'selected' :''}}>Inactivo</option>
      </select>
      </div>
      <a href="/profesionales" class="btn btn-primary btn-sm mt-2" tabindex="12">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm mt-2" tabindex="13">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop