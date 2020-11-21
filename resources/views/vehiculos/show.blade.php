@extends('permissions.layout')


@can('ver vehiculo')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>Ver Vehiculo</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('vehiculos.index') }}"> Volver</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3">
            <h5 class="font-weight-bold">ID: </h5>
            <span>{{$vehiculo->id}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Nombres</h5>
            <span>{{$vehiculo->codigo}}</span>
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold">Apellidos</h5>
            <span>{{$vehiculo->placa}}</span>
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
