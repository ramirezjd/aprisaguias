@extends('layouts.app')


@if((auth()->user()->can('editar instalacion') && $instalacion->id != 1 && auth()->user()->instalacion_id == $instalacion->id) || auth()->user()->hasRole('super-admin'))
    @section('content')
        <div class="container">
            <div class="col-6">
            <h1>Nombre: {{ $instalacion->descripcion }}</h1>
            <h1>Codigo: {{ $instalacion->codigo }}</h1>
            <br>
            <h3>Tipo: {{ $instalacion->tipo_instalacion->nombre }}</h3>
            <br>
            <h2>Direccion :</h2>
            <h3>Estado: {{$instalacion->estado->estado}} </h3>
            <h3>Ciudad: {{$instalacion->ciudad->ciudad}} </h3>
            <h3>Municipio: {{$instalacion->municipio->municipio}} </h3>
            <h3>Parroquia: {{$instalacion->parroquia->parroquia}} </h3>
            <h3>Zip Code: {{$instalacion->zip_code->zip_code}} </h3>
            </div>
        </div>
    @endsection
@else
@section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
@endsection
@endif
