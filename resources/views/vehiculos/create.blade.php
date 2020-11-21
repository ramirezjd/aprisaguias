@extends('vehiculos.layout')

@can('crear vehiculo')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>Crear Nuevo Vehiculo</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('vehiculos.index') }}"> Volver</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="row mx-auto">
            <div class="col-2"></div>
            <div class="col-4">
                <label for="codigo">Codigo</label>
                <input class="form-control " type="text" name="codigo" placeholder="codigo" required>
            </div>
            <div class="col-4">
                <label for="placa">Placa</label>
                <input class="form-control " type="text" name="placa" placeholder="placa" required>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Crear Vehiculo</button>
            </div>
        </div>
    </form>
</div>

@endsection
@endcan

@cannot('crear vehiculo')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
