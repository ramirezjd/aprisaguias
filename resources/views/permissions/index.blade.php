@extends('layouts.app')


@can('ver permisos')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Permisos</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Crear Permiso</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($permissions as $permission)
                    @if ($permission->id%2==0)

                        <td class="text-center">{{ $permission->id }}</td>
                        <td class="text-center">{{ $permission->name }}</td>
                        <td class="text-center">
                            <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Ver</a>
                        </td>
                    @else
                        <tr>
                        <td class="text-center">{{ $permission->id }}</td>
                        <td class="text-center">{{ $permission->name }}</td>
                        <td class="text-center">
                            <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Ver</a>
                        </td>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@endcan

@cannot('ver permisos')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
