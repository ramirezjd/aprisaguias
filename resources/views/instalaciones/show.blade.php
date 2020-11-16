@extends('instalaciones.layout')


@if(auth()->user()->hasPermissionTo(14) && $instalacion->id != 1)
    @section('content')
        <div class="container">
            <div class="col-6">
            <h1>Nombre: {{ $instalacion->descripcion }}</h1>
            <h1>Codigo: {{ $instalacion->codigo }}</h1>
            <h1>Tipo: {{ $instalacion->tipo_instalaciones_id }}</h1>
            <h2>Direccion :</h2>
            <h3>Estado ID: {{$instalacion->estado_id}} </h3>
            <h3>Ciudad ID: {{$instalacion->ciudad_id}} </h3>
            <h3>Municipio ID: {{$instalacion->municipio_id}} </h3>
            <h3>Parroquia ID: {{$instalacion->parroquia_id}} </h3>
            <h3>Zip Code ID: {{$instalacion->zip_code_id}} </h3>
            </div>
        </div>
    @endsection
@endif

@if(auth()->user()->cannot('ver instalacion') || $instalacion->id == 1)
@section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
@endsection
@endif
