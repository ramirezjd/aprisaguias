@extends('permissions.layout')


@can('ver permisos')
    @section('content')
        <div class="container">
            <ul>
                @foreach ($instalaciones as $instalacion)
                    <li>{{ $instalacion->id }} - {{ $instalacion->descripcion }} - {{ $instalacion->tipo_instalaciones_id }}</li>
                @endforeach
            </ul>
        </div>
    @endsection
@endcan

@cannot('ver permisos'){
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
