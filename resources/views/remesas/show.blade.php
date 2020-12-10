@extends('layouts.app')

@if((auth()->user()->can('editar usuario') && (auth()->user()->instalacion_id == $remesa->origen || auth()->user()->instalacion_id == $remesa->destino)) || auth()->user()->hasRole('super-admin'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Ver Remesa</h2>
        </div>
        <div class="col-md-6 margin-tb text-right">
            <a class="btn btn-primary" href="{{ route('remesas.index') }}">Volver</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2>Remesa: {{$remesa->codigo}}, Origen: {{$remesa->cod_origen}}, Destino: {{$remesa->cod_destino}}</h2>
        </div>
    </div>
    @foreach ($guias_paquetes as $guia)
        <div class="row my-3">
            <div class="col-12 align-middle">
                <label class="form-check-label align-middle" for="{{$guia->guia->id}}"><h4>Guia: {{$guia->guia->codigo}} | Origen: {{$guia->guia->cod_origen}} | Destino: {{$guia->guia->cod_destino}} | Peso: {{$guia->guia->peso_total}} | Peso Vol: {{$guia->guia->peso_volumetrico}}</h4></label>
            </div>
            @foreach ($guia->guia->paquetes as $paquete)
            <div class="col-12 align-middle">
                <h5 class="ml-3">Paquete: {{$guia->guia->codigo}}/{{ $loop->index+1 }} | Peso: {{ $paquete->peso }} | Ancho: {{ $paquete->dim_ancho }} | Alto: {{ $paquete->dim_alto }} | Largo: {{ $paquete->dim_fondo }}</h5>
            </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
@else
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endif
