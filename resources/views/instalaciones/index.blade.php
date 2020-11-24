@extends('layouts.app')


@can('ver remesa')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Instalaciones</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('instalaciones.create') }}">Crear instalacion</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <tr>
                    <th>Instalacion ID</th>
                    <th>Instalacion descripcion</th>
                    <th>Instalacion Codigo</th>
                    <th>Instalacion tipo</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($instalaciones as $instalacion)
                <tr>
                    <td class="text-center">{{ $instalacion->id }}</td>
                    <td class="text-center">{{ $instalacion->descripcion}}</td>
                    <td class="text-center">{{ $instalacion->codigo }}</td>
                    <td class="text-center">{{ $instalacion->tipo_instalacion->nombre }}</td>
                    <td class="text-center">
                        <form action="{{ route('instalaciones.destroy', $instalacion->id) }}" method="POST">
                            @can('ver instalacion')
                            <a class="btn btn-info" href="{{ route('instalaciones.show', $instalacion->id) }}">Ver</a>
                            @endcan

                            @can('editar instalacion')
                            <a class="btn btn-primary" href="{{ route('instalaciones.edit', $instalacion->id) }}">Editar</a>
                            @endcan

                            @can('borrar instalacion')
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@endcan



@cannot('ver instalacion')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
