@extends('layouts.app')


@can('crear usuario')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h1>Crear Nuevo Usuario</h2>
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

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row mb-1">
            <h4>Datos de usuario</h4>
        </div>
        <!-- User Data Goes Here -->
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control " type="text" name="username" placeholder="username" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input class="form-control " type="text" name="nombres" placeholder="nombres" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input class="form-control " type="text" name="apellidos" placeholder="apellidos" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="username">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
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
                <select class="ml-4" name="roles" id="roles" required>
                    <option value="">Seleccione un cargo</option>
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
                <select class="ml-4" name="instalacion" id="instalacion" required>
                    <option value="">Seleccione una sucursal</option>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>
</div>
@endsection
@endcan

@cannot('crear usuario')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
