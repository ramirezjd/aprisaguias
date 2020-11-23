@extends('layouts.app')


@can('ver remesa')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Remesas</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('remesas.create') }}"> Crear Remesa</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Peso <small>(Kg)</small></th>
                    <th>Peso Vol <small>(Kg)</small></th>
                    <th>Volumen <small>(Cm3)</small></th>
                    <th>Status</th>
                    <th>Vehiculo</th>
                    <th>Transportista</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($remesas as $remesa)
                <tr>
                    <td class="text-center">{{ $remesa->codigo }}</td>
                    <td class="text-center">{{ $remesa->cod_origen}}</td>
                    <td class="text-center">{{ $remesa->cod_destino }}</td>
                    <td class="text-center">{{ $remesa->peso_total }}</td>
                    <td class="text-center">{{ $remesa->peso_volumetrico_total }}</td>
                    <td class="text-center">{{ $remesa->volumen_total }}</td>
                    <td class="text-center">{{ $remesa->status }}</td>
                    <td class="text-center">{{ $remesa->vehiculo->placa }}</td>
                    <td class="text-center">{{ $remesa->transportista->telefono }}</td>
                    <td class="text-center">
                        <form action="{{ route('remesas.destroy',$remesa->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('remesas.show',$remesa->id) }}">Ver</a>

                            <a class="btn btn-primary" href="{{ route('remesas.edit',$remesa->id) }}">Editar</a>
                            @can('borrar remesa')
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


    <br>
    <div class="row my-3">
        <div class="col-lg-6 margin-tb">
            <h2>Remesas Hacia esta Instalacion</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Peso <small>(Kg)</small></th>
                    <th>Peso Vol <small>(Kg)</small></th>
                    <th>Volumen <small>(Cm3)</small></th>
                    <th>Status</th>
                    <th>Vehiculo</th>
                    <th>Transportista</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($remesas_destino as $remesa)
                <tr>
                    <td class="text-center">{{ $remesa->codigo }}</td>
                    <td class="text-center">{{ $remesa->cod_origen}}</td>
                    <td class="text-center">{{ $remesa->cod_destino }}</td>
                    <td class="text-center">{{ $remesa->peso_total }}</td>
                    <td class="text-center">{{ $remesa->peso_volumetrico_total }}</td>
                    <td class="text-center">{{ $remesa->volumen_total }}</td>
                    <td class="text-center">{{ $remesa->status }}</td>
                    <td class="text-center">{{ $remesa->vehiculo->placa }}</td>
                    <td class="text-center">{{ $remesa->transportista->telefono }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ route('remesas.show',$remesa->id) }}">Recibir</a></td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection
@endcan

@cannot('ver remesa')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
