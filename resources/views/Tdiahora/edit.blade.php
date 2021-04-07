@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edicion de dias por profesional</h1>
@stop

@section('content')
<form method="POST" action="/tdiahora/{{$tdiahora->id}}" >
    @csrf    
    @method('PUT')

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
    <select name="profesional" class="form-control">
		@foreach($profesionales as $profesional)
		<option value="{{$profesional->id}}" {{($tdiahora->profesional===$profesional->id)? 'selected':''}} > {{$profesional->apellido}} </option>
		@endforeach 
		</select>
    </div>
    <div>
  <label for="" class="form-label">Dia:</label>
   <select class="form-control" id="dia" name="dia">
   <option value="1" @if($tdiahora->dia=='1')selected @endif>Lunes</option>
   <option value="2" @if($tdiahora->dia=='2')selected @endif>Martes</option>
   <option value="3" @if($tdiahora->dia=='3')selected @endif>Miercoles</option>
   <option value="4" @if($tdiahora->dia=='4')selected @endif>Jueves</option>
   <option value="5" @if($tdiahora->dia=='5')selected @endif>Viernes</option>
   <option value="6" @if($tdiahora->dia=='6')selected @endif>Sabado</option>
   
  </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Horainicio</label>
    <input id="horainicio" name="horainicio" type="time"  class="form-control" value="{{$tdiahora->horainicio}}"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Horafin</label>
    <input id="horafin" name="horafin" type="time"  class="form-control" value="{{$tdiahora->horafin}}"/>
  </div>
  
  
   <a href="/tdiahora" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop