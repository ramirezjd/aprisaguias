@extends('layouts.app')


@can('editar permisos')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>Editar Permiso</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>Editar Permiso: {{ $permissions->name }}</h1>
            <form action="{{ route('permissions.update',$permissions->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="Name">Nombre del permiso: {{ $permissions->name }}</label>
                    <input class="form-control " type="text" name="name"
                    placeholder=" nuevo nombre del permiso" value="{{ $permissions->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
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
