@extends('remesas.layout')


@can('ver remesa')
    @section('content')
        <div class="container">
            <div class="row mb-4">
                <div class="col-2 text-center">
                    <span>Instalacion ID</span>
                </div>
                <div class="col-2">
                    <span>Instalacion descripcion</span>
                </div>
                <div class="col-2">
                    <span>Instalacion Codigo</span>
                </div>
                <div class="col-2">
                    <span>Instalacion tipo</span>
                </div>
                <div class="col-3">
                    <span>Acciones</span>
                </div>
            </div>
            @foreach ($instalaciones as $instalacion)
            <div class="row my-3">
                <div class="col-2 text-center">
                    <span>{{$instalacion->id}}</span>
                </div>
                <div class="col-2">
                    <span>{{$instalacion->descripcion}}</span>
                </div>
                <div class="col-2">
                    <span>{{$instalacion->codigo}}</span>
                </div>
                <div class="col-2">
                    <span>{{$instalacion->tipo_instalacion->nombre}}</span>
                </div>
                <div class="col-3">
                    <form action="{{ route('instalaciones.destroy',$instalacion->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('instalaciones.show',$instalacion->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('instalaciones.edit',$instalacion->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endsection
@endcan



@cannot('ver instalacion'){
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
