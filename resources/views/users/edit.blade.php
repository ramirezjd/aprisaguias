@extends('instalaciones.layout')

@can('editar usuario')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h1>Editar Usuario</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-1">
            <h4>Datos de usuario</h4>
        </div>
        <!-- User Data Goes Here -->

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control " type="text" name="username" placeholder="username" value="{{$user->username}}" required>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input class="form-control " type="text" name="nombres" placeholder="nombres" value="{{$user->nombres}}" required>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input class="form-control " type="text" name="apellidos" placeholder="apellidos" value="{{$user->apellidos}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}" required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="username">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
            </div>
        </div>

        <hr>
        <div class="row mb-1">
            <h4>Datos de empleo</h4>
        </div>

        <!-- Roles and Facilities Goes Here -->

        <div class="row">
            <!--Roles -->
            <div class="col -6">
                <label class="form-check-label" for="roles">Cargo</label>
                <select class="ml-4" name="roles" id="roles">
                    <option value="0">Seleccione un cargo</option>
                    @foreach ($roles as $role)
                    <div class="col-3">
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    </div>
                    @endforeach
                </select>
            </div>

            <!-- Facilities -->
            <div class="col -6">
                <label class="form-check-label" for="instalacion">Instalacion asociada</label>
                <select class="ml-4" name="instalacion" id="instalacion">
                    <option value="0">Seleccione una sucursal</option>
                    @foreach ($instalaciones as $instalacion)
                    <div class="col-3">
                        <option value="{{$instalacion->id}}">{{$instalacion->id}} / {{$instalacion->codigo}} / {{$instalacion->descripcion}}</option>
                    </div>
                    @endforeach
                </select>
            </div>

        </div>

        <hr>
        <div class="row mb-1">
            <h4>Lista de Permisos</h4>
        </div>
        <!-- Permissions Goes Here -->

        <div class="row mx-4">
            @foreach ($permissions as $permission)
            <div class="col-3">
                <input type="checkbox" class="form-check-input" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
                <label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
            </div>
            @endforeach
        </div>

        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
</div>

    <script type="text/javascript">
    $( document ).ready(function() {

        $("#instalacion").val('{{$user->instalacion_id}}');
        $("#roles").val('{{$role_id->id}}');

        @foreach ($arraypermisos as $arraypermiso)
                $("#{{$arraypermiso}}").prop("checked", true);
        @endforeach

    });
    </script>

@endsection
@endcan

@cannot('editar usuario')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
