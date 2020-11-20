@extends('users.layout')


@can('ver transportista')
    @section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6 margin-tb">
                <h2>CRUD de Transportistas</h2>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-success" href="{{ route('transportistas.create') }}"> Crear Transportista</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Tipo Documento</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($transportistas as $transportista)
                    <tr>
                        <td class="text-center">{{ $transportista->id }}</td>
                        <td class="text-center">{{ $transportista->tipo_documento}}</td>
                        <td class="text-center">{{ $transportista->documento}}</td>
                        <td class="text-center">{{ $transportista->nombres }}</td>
                        <td class="text-center">{{ $transportista->apellidos }}</td>
                        <td class="text-center">{{ $transportista->direccion}}</td>
                        <td class="text-center">{{ $transportista->telefono }}</td>
                        <td class="text-center">
                            <form action="{{ route('transportistas.destroy',$transportista->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('transportistas.show',$transportista->id) }}">Ver</a>
                                <a class="btn btn-primary" href="{{ route('transportistas.edit',$transportista->id) }}">Editar</a>
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

@cannot('ver transportista')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
