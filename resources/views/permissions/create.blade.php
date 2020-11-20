@extends('permissions.layout')


@can('crear permisos')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>Crear Permiso</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Volver</a>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Name">Nombre del permiso</label>
                    <input class="form-control " type="text" name="name" placeholder="nombre del permiso">
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>

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
