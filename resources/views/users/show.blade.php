@extends('layouts.app')

@can('ver usuario')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h1>Ver Usuario</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
        </div>
    </div>

    <div class="row mb-1">
        <h4>Datos de usuario</h4>
    </div>

    <div class="row">
        <div class="col-3">
            <h5 class="font-weight-bold">Username</h5>
            <span>{{$user->username}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Nombres</h5>
            <span>{{$user->nombres}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Apellidos</h5>
            <span>{{$user->apellidos}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Email</h5>
            <span>{{$user->email}}</span>
        </div>
    </div>

    <hr>
    <div class="row mb-1">
        <h4>Datos de empleo</h4>
    </div>

    <div class="row">
        <div class="col-6">
            <h5 class="font-weight-bold">Cargo</h5>
            <span>{{ $user->getRoleNames()->first() }}</span>
        </div>
        <div class="col-6">
            <h5 class="font-weight-bold">Instalacion</h5>
            <span>{{ $user->instalacion->codigo }} </span>
        </div>
    </div>

    <hr>
    <div class="row mb-1">
        <h4>Lista de Permisos</h4>
    </div>

    <div class="row mx-4">
        @foreach ($user->getDirectPermissions() as $permission)
        <div class="col-2">
            <span>-{{$permission->name}}</span>
        </div>
        @endforeach
    </div>

    <hr>
    <div class="row mb-1">
        <h4>Guias generadas por este usuario</h4>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Codigo</th>
                    <th>Precio</th>
                    <th>Peso Total</th>
                    <th>Peso Volumetrico</th>
                    <th>Nº Paquetes</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Status</th>
                    <th>Fecha de Creacion</th>
                </tr>
                @foreach ($user->guias as $guia)
                <tr>
                    <td class="text-center">{{ $guia->codigo }}</td>
                    <td class="text-center">{{ $guia->precio }}</td>
                    <td class="text-center">{{ $guia->peso_total }}</td>
                    <td class="text-center">{{ $guia->peso_volumetrico }}</td>
                    <td class="text-center">{{ $guia->n_paquetes }}</td>
                    <td class="text-center">{{ $guia->cod_origen }}</td>
                    <td class="text-center">{{ $guia->cod_destino }}</td>
                    <td class="text-center">{{ $guia->status }}</td>
                    <td class="text-center">{{ $guia->fecha_creacion }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>



</div>
@endsection
@endcan

@cannot('ver usuario')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
