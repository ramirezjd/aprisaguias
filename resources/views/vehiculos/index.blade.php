@extends('users.layout')


@can('ver vehiculo')
    @section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6 margin-tb">
                <h2>CRUD de Vehiculos</h2>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-success" href="{{ route('vehiculos.create') }}"> Crear Vehiculo</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Placa</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td class="text-center">{{ $vehiculo->id }}</td>
                        <td class="text-center">{{ $vehiculo->codigo}}</td>
                        <td class="text-center">{{ $vehiculo->placa }}</td>
                        <td class="text-center">
                            <form action="{{ route('vehiculos.destroy',$vehiculo->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('vehiculos.show',$vehiculo->id) }}">Ver</a>
                                <a class="btn btn-primary" href="{{ route('vehiculos.edit',$vehiculo->id) }}">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endsection
@endcan

@cannot('ver vehiculo')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
