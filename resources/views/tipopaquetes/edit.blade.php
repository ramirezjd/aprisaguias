@extends('layouts.app')

@can('editar tipo_paquete')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Editar Tipo de Paquete</h2>
        </div>
        <div class="col-md-6 margin-tb text-right">
            <a class="btn btn-primary" href="{{ route('tipopaquetes.index') }}">Volver</a>
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

    <form action="{{ route('tipopaquetes.update',$tipo_paquete->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mx-auto my-3">
            <div class="col-4">
                <label for="codigo">Nombre</label>
                <input class="form-control " type="text" name="nombre" placeholder="nombre" value="{{$tipo_paquete->nombre}}" required>
            </div>
            <div class="col-4">
                <label for="placa">Descripcion</label>
                <input class="form-control " type="text" name="descripcion" placeholder="descripcion" value="{{$tipo_paquete->descripcion}}" required>
            </div>
            <div class="col-4">
                @if ($tipo_paquete->precio == NULL)
                @else
                    <label for="placa">Precio</label>
                    <input class="form-control " type="text" name="precio" placeholder="precio" value="{{$tipo_paquete->precio}}" required>
                @endif
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

@cannot('editar tipo_paquete')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
