@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Generacion de calendarios</h1>
@stop

@section('content')

<form action="gcalendario" method="">
    @csrf

    @if (session('status'))
            @if(session('status') == '1')
                <div class="alert alert-success">
                Generado satisfactoriamente !
                </div>
            
            @endif
@endif
  
       <input type="submit" class="btn btn-info" id="" value="Volver"> </input>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    
@stop