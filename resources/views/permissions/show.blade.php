@extends('layouts.app')


@can('ver permisos')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>Ver Permiso</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
            <h1>ID: {{ $permissions->id }}</h1>
            <h1>Nombre: {{ $permissions->name }}</h1>
        </div>
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
