@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Alta de Dias por profesional</h1>
@stop

@section('content')
<form action="/tdiahora" method="POST">
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
              <label for="">Profesional:</label>
              <select class="form-control" tabindex="1" name="profesional" aria-label="Default select example">
              <option value="">--Seleccione profesional--</option>
                @foreach($profesionales as $profesionales)            
                @if (old('profesional')==$profesionales->id)
                        <option value={{$profesionales->id}} selected>{{ $profesionales->apellido }}</option>
                    @else
                        <option value={{$profesionales->id}} >{{ $profesionales->apellido }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="">Dia:</label>
          <select class="form-control" tabindex="2" name="dia" aria-label="Default select example">
          <option selected>--Seleccione dia--</option>
            <option value="1" {{old('dia')==1 ? 'selected' :''}}>Lunes</option>
            <option value="2" {{old('dia')==2 ? 'selected' :''}}>Martes</option>
            <option value="3"  {{old('dia')==3 ? 'selected' :''}}>Miercoles</option>
            <option value="4"  {{old('dia')==4 ? 'selected' :''}}>Jueves</option>
            <option value="5"  {{old('dia')==5 ? 'selected' :''}}>Viernes</option>
            <option value="6"  {{old('dia')==6 ? 'selected' :''}}>Sabado</option>
          </select>

         </div>

          <div class="form-group">
              <label for="">Horainicio:</label>
              <input type="time"  class="form-control" tabindex="3" name="horainicio" value="{{old('horainicio')}}"/>
          </div>

          <div class="form-group">
              <label for="">Horafin:</label>
              <input type="time"  class="form-control" tabindex="4" name="horafin" value="{{old('horafin')}}"/>
          </div>
      
      <a href="/tdiahora" class="btn btn-primary btn-sm btn-danger" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary btn-sm " tabindex="6">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop