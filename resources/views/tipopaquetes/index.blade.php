@extends('layouts.app')


@can('ver tipo_paquete')
    @section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6 margin-tb">
                <h2>CRUD de Tipo de Paquete</h2>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-success" href="{{ route('tipopaquetes.create') }}"> Crear Tipo de Paquete</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($tipos as $tipo)
                    <tr>
                        <td class="text-center">{{ $tipo->id }}</td>
                        <td class="text-center">{{ $tipo->nombre}}</td>
                        <td class="text-center">{{ $tipo->descripcion}}</td>
                        <td class="text-center">
                            @if ($tipo->precio == NULL)
                                Variable
                            @else
                                {{ $tipo->precio }}
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('tipopaquetes.destroy',$tipo->id) }}" method="POST">
                                @can ('ver tipo_paquete')
                                <a class="btn btn-info" href="{{ route('tipopaquetes.show',$tipo->id) }}">Ver</a>
                                @endcan

                                @can('editar tipo_paquete')
                                <a class="btn btn-primary" href="{{ route('tipopaquetes.edit',$tipo->id) }}">Editar</a>
                                @endcan

                                @can ('borrar tipo_paquete')
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
    @endsection
@endcan

@cannot('ver tipo_paquete')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
