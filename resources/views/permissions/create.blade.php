@extends('permissions.layout')


@can('crear permisos')
    @section('content')
        <div class="container">
            <h1>Crear Permiso</h1>
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Name">Nombre del permiso</label>
                    <input class="form-control " type="text" name="name" placeholder="nombre del permiso">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
@endcan

@cannot('crear permisos')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
