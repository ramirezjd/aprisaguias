@extends('layouts.app')

@can('ver guia')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Guias</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('guias.create') }}">Crear Guia</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@hasrole('super-admin')

    <div class="row">
        <div class="col-12">
            <h2>Guias Admin</h2><br>
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Peso (Kg)</th>
                    <th>Peso Vol (Kg)</th>
                    <th>Precio</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Actual</th>
                    <th>Nº Paq</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($guias_enviar as $guia)
                <tr>
                    <td class="text-center">{{ $guia->codigo }}</td>
                    <td class="text-center">{{ $guia->peso_total}}</td>
                    <td class="text-center">{{ $guia->peso_volumetrico }}</td>
                    <td class="text-center">{{ $guia->precio }}</td>
                    <td class="text-center">{{ $guia->cod_origen }}</td>
                    <td class="text-center">{{ $guia->cod_destino }}</td>
                    <td class="text-center">{{ $guia->cod_actual }}</td>
                    <td class="text-center">{{ $guia->n_paquetes }}</td>
                    <td class="text-center">{{ $guia->status }}</td>
                    <td class="text-center">

                        @if(auth()->user()->can('ver guia') && ($guia->instalacion_origen_id == $user->instalacion_id || $guia->instalacion_actual_id == $user->instalacion_id || $user->hasRole ('super-admin')))
                        <form action="{{ route('guias.destroy',$guia->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('guias.show',$guia->id) }}">Ver</a>

                            <a class="btn btn-primary d-none" href="{{ route('guias.edit',$guia->id) }}">Editar</a>

                            <a class="btn btn-success" href="{{ route('pdftest',$guia->id) }}">Imprimir </a>
                            @can('borrar guia')
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger d-none">Borrar</button>
                            @endcan
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

@else
    <div class="row">
        <div class="col-12">
            <h2>Guias por Enviar</h2><br>
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Peso (Kg)</th>
                    <th>Peso Vol (Kg)</th>
                    <th>Precio</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Actual</th>
                    <th>Nº Paq</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($guias_enviar as $guia)
                <tr>
                    <td class="text-center">{{ $guia->codigo }}</td>
                    <td class="text-center">{{ $guia->peso_total}}</td>
                    <td class="text-center">{{ $guia->peso_volumetrico }}</td>
                    <td class="text-center">{{ $guia->precio }}</td>
                    <td class="text-center">{{ $guia->cod_origen }}</td>
                    <td class="text-center">{{ $guia->cod_destino }}</td>
                    <td class="text-center">{{ $guia->cod_actual }}</td>
                    <td class="text-center">{{ $guia->n_paquetes }}</td>
                    <td class="text-center">{{ $guia->status }}</td>
                    <td class="text-center">
                        <form action="{{ route('guias.destroy',$guia->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('guias.show',$guia->id) }}">Ver</a>

                            <a class="btn btn-primary d-none" href="{{ route('guias.edit',$guia->id) }}">Editar</a>

                            <a class="btn btn-success" href="{{ route('pdftest',$guia->id) }}">Imprimir </a>
                            @can('borrar guia')
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger d-none">Borrar</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <h2>Guias por Entregar</h2><br>
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Peso (Kg)</th>
                    <th>Peso Vol (Kg)</th>
                    <th>Precio</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Actual</th>
                    <th>Nº Paq</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($guias_entregar as $guia)
                <tr>
                    <td class="text-center">{{ $guia->codigo }}</td>
                    <td class="text-center">{{ $guia->peso_total}}</td>
                    <td class="text-center">{{ $guia->peso_volumetrico }}</td>
                    <td class="text-center">{{ $guia->precio }}</td>
                    <td class="text-center">{{ $guia->cod_origen }}</td>
                    <td class="text-center">{{ $guia->cod_destino }}</td>
                    <td class="text-center">{{ $guia->cod_actual }}</td>
                    <td class="text-center">{{ $guia->n_paquetes }}</td>
                    <td class="text-center">{{ $guia->status }}</td>
                    <td class="text-center">
                        <div class="d-flex">
                            <a class="btn btn-info" href="{{ route('guias.show',$guia->id) }}">Ver</a>

                            <form action="{{route('entregarguia')}}" method="GET">
                                <input type='text' name='id' value="{{$guia->id}}" hidden>
                                <button type="submit" class="btn btn-success mx-1">Entregar</button>
                            </form>

                            <a class="btn btn-primary d-none" href="{{ route('guias.edit',$guia->id) }}">Editar</a>

                            <a class="btn btn-success" href="{{ route('pdftest',$guia->id) }}">Imprimir </a>
                        @can('borrar guia')
                        <form action="{{ route('guias.destroy',$guia->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-none">Borrar</button>

                        </form>
                        @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Guias Entregadas</h2><br>
            <table class="table table-bordered">
                <tr>
                    <th>Cod</th>
                    <th>Peso (Kg)</th>
                    <th>Peso Vol (Kg)</th>
                    <th>Precio</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Actual</th>
                    <th>Nº Paq</th>
                    <th>Status</th>
                </tr>
                @foreach ($guias_entregadas as $guia)
                <tr>
                    <td class="text-center">{{ $guia->codigo }}</td>
                    <td class="text-center">{{ $guia->peso_total}}</td>
                    <td class="text-center">{{ $guia->peso_volumetrico }}</td>
                    <td class="text-center">{{ $guia->precio }}</td>
                    <td class="text-center">{{ $guia->cod_origen }}</td>
                    <td class="text-center">{{ $guia->cod_destino }}</td>
                    <td class="text-center">{{ $guia->cod_actual }}</td>
                    <td class="text-center">{{ $guia->n_paquetes }}</td>
                    <td class="text-center">{{ $guia->status }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
@endhasrole
@endsection
@endcan

@cannot('ver guia')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
