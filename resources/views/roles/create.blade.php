@extends('layouts.app')


@can('crear roles')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>Crear Rol</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Volver</a>
        </div>
    </div>


    <form action="{{ route('roles.store') }}" method="POST">

            @csrf
            <div class="row m-4">
                <div class="col">
                    <div class="form-group">
                        <label for="Name">Nombre del rol</label>
                        <input class="form-control " type="text" name="name" placeholder="nombre del permiso">
                    </div>
                </div>
            </div>

            <div class="row m-4 ">
                @foreach ($permissions as $permission)
                <div class="col-3">
                    <input type="checkbox" class="form-check-input" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
                    <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                </div>
                @endforeach
            </div>

            <div class="row m-4 text-center">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
    </form>


</div>
@endsection
@endcan

@cannot('crear roles')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
