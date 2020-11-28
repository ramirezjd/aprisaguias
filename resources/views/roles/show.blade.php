@extends('layouts.app')


@can('ver roles')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>Ver Permiso</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
            <h1>ID: {{ $role->id }}</h1>
            <h1>Nombre: {{ $role->name }}</h1>
        </div>
    </div>
    <hr>
    <div class="row mb-1">
        <h4>Lista de Permisos</h4>
    </div>

    <div class="row mx-4">
        @foreach ($permissions as $permission)
        <div class="col-2">
            <span>-{{$permission->name}}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection
@endcan

@cannot('ver roles')
@section('content')
    <div class="container">
        <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
    </div>
@endsection
@endcannot
