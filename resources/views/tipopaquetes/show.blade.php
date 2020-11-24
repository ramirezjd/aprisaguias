@extends('layouts.app')


@can('ver tipo_paquete')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>Ver Tipo de Paquete</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('tipopaquetes.index') }}"> Volver</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3">
            <h5 class="font-weight-bold">ID: </h5>
            <span>{{$tipo_paquete->id}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Nombre</h5>
            <span>{{$tipo_paquete->nombre}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Descripcion</h5>
            <span>{{$tipo_paquete->descripcion}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Precio</h5>
            <span>
            @if ($tipo_paquete->precio == NULL)
                Variable
            @else
                {{ $tipo_paquete->precio }}
            @endif
            </span>
        </div>
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
