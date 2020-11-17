@extends('permissions.layout')


@can('crear remesa')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col mb-3">
                    <h1>Crear Remesa</h1>
                </div>
            </div>


            <form action="{{ route('remesas.store') }}" method="POST">
                @csrf
                <!-- User Data Goes Here -->

                <div class="row">
                    <div class="col-2">
                        <span>#</span>
                    </div>
                    <div class="col-2">
                        <span>Codigo de Guia</span>
                    </div>
                    <div class="col-2">
                        <span>Creada por</span>
                    </div>
                    <div class="col-2">
                        <span>Origen</span>
                    </div>
                    <div class="col-2">
                        <span>Destino</span>
                    </div>
                    <div class="col-2">
                        <span>Fecha-Creacion</span>
                    </div>
                </div>

                @foreach ($guias as $guia)
                <div class="row my-2">
                    <div class="col-2">
                        <input type="checkbox" class="text-center" id="{{$guia->id}}" name="guiasarray[]" value="{{$guia->id}}">
                        <span>{{$guia->id}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$guia->codigo}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$guia->user->username}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$user->instalacion->codigo}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$user->instalacion->codigo}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$guia->created_at}}</span>
                    </div>
                </div>
                @endforeach

                <input name="codigo" type="hidden" value="{{ $rand = substr(md5(microtime()),rand(0,26),7) }}">
                <br>

                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    @endsection
@endcan

@cannot('crear remesa')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
