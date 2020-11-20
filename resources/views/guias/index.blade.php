@extends('guias.layout')

@can('ver guia')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Guias</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('guias.create') }}"> Crear Guia</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Peso (Kg)</th>
                    <th>Peso Vol (Kg)</th>
                    <th>Precio</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Nº Paquetes</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($guias as $guia)
                <tr>
                    <td class="text-center">{{ $guia->codigo }}</td>
                    <td class="text-center">{{ $guia->peso_total}}</td>
                    <td class="text-center">{{ $guia->peso_volumetrico }}</td>
                    <td class="text-center">{{ $guia->precio }}</td>
                    <td class="text-center">{{ $guia->cod_origen }}</td>
                    <td class="text-center">{{ $guia->cod_destino }}</td>
                    <td class="text-center">{{ $guia->n_paquetes }}</td>
                    <td class="text-center">{{ $guia->status }}</td>
                    <td class="text-center">
                        <form action="{{ route('guias.destroy',$guia->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('guias.show',$guia->id) }}">Ver</a>

                            <a class="btn btn-primary" href="{{ route('guias.edit',$guia->id) }}">Editar</a>

                            <a class="btn btn-success" href="{{ route('pdftest',$guia->id) }}">Imprimir </a>
                            @can('borrar guia')
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

@cannot('ver guia')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
