@extends('permissions.layout')


@can('ver permisos')
    @section('content')
        <div class="container">
            <div class="col-6">
            <h1>Nombre: {{ $permissions->name }}</h1>
            </div>
        </div>
    @endsection
@endcan

@cannot('ver permisos')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
