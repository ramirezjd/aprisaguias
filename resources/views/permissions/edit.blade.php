@extends('permissions.layout')


@can('editar permisos')
    @section('content')
        <div class="container">
            <h1>Editar Permiso: {{ $permissions->name }}</h1>
            <form action="{{ route('permissions.update',$permissions->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="Name">Nombre del permiso actual: {{ $permissions->name }}</label>
                    <input class="form-control " type="text" name="name"
                    placeholder=" nuevo nombre del permiso" value="{{ $permissions->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
@endcan

@cannot('editar permisos')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
