@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edicion de dias inactivos por profesional</h1>
@stop

@section('content')
<form method="POST" action="/diainactivo/{{$diainactivos->id}}" >
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

 
    <div class="mb-3">
           <label for="" class="form-label">Profesional</label>
           <select name="profesional" class="form-control">
	@foreach($profesionales as $profesional)
		<option value="{{$profesional->id}}"{{($diainactivos->profesional===$profesional->id)? 'selected':''}} >{{$profesional->apellido}} </option>
		@endforeach 
	</select>
  </div>
    <div class="mb-3">
    <label for="" class="form-label">diadesde</label>
    <input id="diadesde" name="diadesde" type="date" class="form-control" value="{{$diainactivos->diadesde}}"/>
    </div>
   
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$diainactivos->descripcion}}"/>
  </div>
  
     <a href="/diainactivo" class="btn btn-primary btn-sm btn-danger">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-sm m-2">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop