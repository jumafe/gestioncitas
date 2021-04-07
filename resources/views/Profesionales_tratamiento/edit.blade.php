@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Edicion de Tratamientos por profesional</h1>
@stop

@section('content')
<form method="POST" action="/profesionales_tratamiento/{{$profesionales_tratamiento->id}}" >
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
  <select name="profesionales_id" class="form-control">
	@foreach($profesionales as $profesional)
		<option value="{{$profesional->id}}" {{($profesionales_tratamiento->profesionales_id===$profesional->id)? 'selected':''}} >{{$profesional->apellido}} </option>
		@endforeach 
	</select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Tratamiento</label>
  <select name="tratamiento_id" class="form-control">
	@foreach($tratamientos as $tratamiento)
		<option value="{{$tratamiento->id}}" {{($profesionales_tratamiento->tratamiento_id===$tratamiento->id)? 'selected':''}} >{{$tratamiento->descripcion}} </option>
		@endforeach 
	</select>
  </div>    
   <a href="/profesionales_tratamiento" class="btn btn-primary btn-sm m-2">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-sm m-2">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop