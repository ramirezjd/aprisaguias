@extends('guias.layout')

@can('editar vehiculo')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Editar Vehiculo</h2>
        </div>
        <div class="col-md-6 margin-tb text-right">
            <a class="btn btn-primary" href="{{ route('vehiculos.index') }}">Volver</a>
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

    <form action="{{ route('vehiculos.update',$vehiculo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mx-auto my-3">
            <div class="col-2"></div>
            <div class="col-4">
                <label for="codigo">Codigo</label>
                <input class="form-control " type="text" name="codigo" placeholder="codigo" value="{{$vehiculo->codigo}}" required>
            </div>
            <div class="col-4">
                <label for="placa">Placa</label>
                <input class="form-control " type="text" name="placa" placeholder="placa" value="{{$vehiculo->placa}}" required>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Actualizar Vehiculo</button>
            </div>
        </div>

    </form>
</div>
@endsection

@endcan

@cannot('editar vehiculo')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
