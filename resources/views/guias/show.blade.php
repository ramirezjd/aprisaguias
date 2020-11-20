@extends('guias.layout')

@can('ver guia')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h2> Guia #{{ $guia->codigo }} </h2>
            </div>
            <div class="col-lg-6 text-right">
                <a class="btn btn-primary" href="{{ route('guias.index') }}"> Volver</a>
            </div>
        </div>

        <div class="row mb-4">
            <h3 class="font-weight-bold">Datos de la guia: </h3>
        </div>

        <div class="row mb-4">
            <div class="col-2">
                <h5 class="font-weight-bold">Precio:</h5>
                <span>{{ $guia->precio }}</span>
            </div>

            <div class="col-2">
                <h5 class="font-weight-bold">Tipo de Pago:</h5>
                <span>{{ $guia->tipo_pago->nombre }}</span>
            </div>

            <div class="col-2">
                <h5 class="font-weight-bold">Origen:</h5>
                <span>{{ $guia->cod_origen }}</span>
            </div>

            <div class="col-2">
                <h5 class="font-weight-bold">Destino:</h5>
                <span>{{ $guia->cod_destino }}</span>
            </div>

            <div class="col-2">
                <h5 class="font-weight-bold">Peso Total:</h5>
                <span>{{ $guia->peso_total }} Kg</span>
            </div>

            <div class="col-2">
                <h5 class="font-weight-bold">Peso Volumetrico:</h5>
                <span>{{ $guia->peso_volumetrico }} Kg</span>
            </div>

        </div>

        <div class="row mb-4">
            <h3 class="font-weight-bold">Paquetes: </h3>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Nº Paq.</th>
                        <th>Tipo Paq.</th>
                        <th>Peso (Kg)</th>
                        <th>Ancho (Cm)</th>
                        <th>Alto (Cm)</th>
                        <th>Largo (Cm)</th>
                        <th>Peso Vol.(Kg)</th>
                    </tr>
                    @foreach ($guia->paquetes as $paquete)
                    <tr>
                        <td class="text-center">{{ $paquete->id }}</td>
                        <td class="text-center">{{ $paquete->tipo_paquete->nombre }}</td>
                        <td class="text-center">{{ $paquete->peso }}</td>
                        <td class="text-center">{{ $paquete->dim_ancho }}</td>
                        <td class="text-center">{{ $paquete->dim_alto }}</td>
                        <td class="text-center">{{ $paquete->dim_fondo }}</td>
                        <td class="text-center">{{ $paquete->peso_volumetrico }}</td>
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
