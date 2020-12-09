@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Datos de la guia</h3>
                <p>
                    Guia: {{$guia->codigo}}, {{$guia->codigo}}, {{$guia->n_paquetes}}, {{$guia->cod_origen}}, {{$guia->cod_destino}}, {{$guia->cod_actual}}, {{$guia->status}}
                </p>
            </div>
        </div>

        @foreach ($guias as $guia)
        @if ($loop->first)
        <div class="row">
            <div class="col my-3">
                <h4 class="text-danger">Datos de remesa</h4>
                <p>
                    Remesa: {{$guia->remesa->codigo}}, {{$guia->remesa->cod_origen}}, {{$guia->remesa->cod_destino}}, {{$guia->remesa->status}}, {{$guia->remesa->created_at}}
                </p>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col my-3">
                <h4 class="text-muted">Datos de remesa</h4>
                <p class="text-muted">
                    Remesa: {{$guia->remesa->codigo}}, {{$guia->remesa->cod_origen}}, {{$guia->remesa->cod_destino}}, {{$guia->remesa->status}}, {{$guia->remesa->created_at}}
                </p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
@endsection
