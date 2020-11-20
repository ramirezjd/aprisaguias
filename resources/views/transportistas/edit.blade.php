@extends('vehiculos.layout')

@can('editar transportista')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>Editar Transportista</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('transportistas.index') }}"> Volver</a>
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

    <form action="{{ route('transportistas.update', $transportista->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mx-auto">
            <div class="col-3">
                <label for="tipo_documento">Tipo documento</label>
                <select name="tipo_documento" id="tipo_documento" required>
                    <option value="">Seleccione un tipo de documento</option>
                    <option value="V-">V-</option>
                    <option value="E-">E-</option>
                    <option value="RIF">RIF</option>
                    <option value="NIT">NIT</option>
                </select>
            </div>
            <div class="col-3">
                <label for="documento">Documento</label>
                <input class="form-control " type="text" name="documento" placeholder="documento" value="{{$transportista->documento}}" required>
            </div>
            <div class="col-3">
                <label for="nombres">Nombres</label>
                <input class="form-control " type="text" name="nombres" placeholder="nombres" value="{{$transportista->nombres}}" required>
            </div>
            <div class="col-3">
                <label for="apellidos">Apellidos</label>
                <input class="form-control " type="text" name="apellidos" placeholder="apellidos" value="{{$transportista->apellidos}}" required>
            </div>
            <div class="col-3">
                <label for="telefono">Telefono</label>
                <input class="form-control " type="tel" name="telefono" placeholder="telefono" value="{{$transportista->telefono}}" required>
            </div>
            <div class="col-3">
                <label for="direccion">Direccion</label>
                <textarea class="form-control"  rows="2" name="direccion" placeholder="direccion" required>{{$transportista->direccion}}</textarea>
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

@cannot('editar transportista')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
