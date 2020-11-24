@extends('layouts.app')


@can('ver roles')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Permisos</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Crear Role</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($roles as $role)
                    @if ($role->id%2!=0)

                        <td class="text-center p-1 align-middle">{{ $role->id }}</td>
                        <td class="text-center p-1 align-middle">{{ $role->name }}</td>
                        <td class="text-center p-1 align-middle">
                            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                @can('ver roles')
                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Ver</a>
                                @endcan

                                @can('editar roles')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                @endcan

                                @can('borrar roles')
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                                @endcan
                            </form>
                        </td>
                    @else
                        <tr>
                        <td class="text-center p-1 align-middle">{{ $role->id }}</td>
                        <td class="text-center p-1 align-middle">{{ $role->name }}</td>
                        <td class="text-center p-1 align-middle">
                            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                @can('ver roles')
                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Ver</a>
                                @endcan

                                @can('editar roles')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                @endcan

                                @can('borrar roles')
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                                @endcan
                            </form>
                        </td>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@endcan

@cannot('ver roles')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
