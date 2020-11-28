@extends('layouts.app')

@can('crear tipo_paquete')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>Crear Nuevo Tipo de Paquete</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('tipopaquetes.index') }}"> Volver</a>
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

    <form action="{{ route('tipopaquetes.store') }}" method="POST">
        @csrf
        <div class="row mx-auto">
            <div class="col-4">
                <label for="codigo">Nombre</label>
                <input class="form-control " type="text" name="nombre" placeholder="nombre" required>
            </div>
            <div class="col-4">
                <label for="placa">Descripcion</label>
                <input class="form-control " type="text" name="descripcion" placeholder="descripcion" required>
            </div>
            <div class="col-4">
                <label for="placa">Precio</label>
                <input class="form-control " type="text" name="precio" placeholder="precio" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</div>

@endsection
@endcan

@cannot('crear tipo_paquete')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
