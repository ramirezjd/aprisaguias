@extends('layouts.app')


@can('editar permisos')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>Editar Permiso</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>Editar Permiso: {{ $role->name }}</h1>
            <form action="{{ route('roles.update',$role->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="Name">Nombre del rol: {{ $role->name }}</label>
                    <input class="form-control " type="text" name="name"
                    placeholder=" nuevo nombre del rol" value="{{ $role->name }}">
                </div>

                <div class="row m-4 ">
                    @foreach ($permissions as $permission)
                    <div class="col-3">
                        <input type="checkbox" class="form-check-input" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
                        <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

</div>


<script type="text/javascript">
    $( document ).ready(function() {
        @foreach ($role->getAllPermissions() as $permiso)
                $("#{{$permiso->id}}").prop("checked", true);
        @endforeach
    });
</script>
@endsection
@endcan

@cannot('editar permisos')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
