@extends('layouts.app')


@can('ver vehiculo')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>Ver Transportistas</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('transportistas.index') }}"> Volver</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3">
            <h5 class="font-weight-bold">ID: </h5>
            <span>{{$transportista->id}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Tipo documento</h5>
            <span>{{$transportista->tipo_documento}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Documento</h5>
            <span>{{$transportista->documento}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Nombres</h5>
            <span>{{$transportista->nombres}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Apellidos</h5>
            <span>{{$transportista->apellidos}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Direccion</h5>
            <span>{{$transportista->direccion}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Telefono</h5>
            <span>{{$transportista->telefono}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Status</h5>
            <span>{{$transportista->status}}</span>
        </div>
    </div>

</div>
@endsection
@endcan

@cannot('ver vehiculo')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
