@extends('layouts.app')

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

                <div class="row mb-3">
                    <div class="col-1">
                        <span class="font-weight-bold">#</span>
                    </div>
                    <div class="col-2">
                        <span class="font-weight-bold">Codigo de guia</span>
                    </div>
                    <div class="col-2">
                        <span class="font-weight-bold">Creador</span>
                    </div>
                    <div class="col-1">
                        <span class="font-weight-bold">Origen</span>
                    </div>
                    <div class="col-1">
                        <span class="font-weight-bold">Destino</span>
                    </div>
                    <div class="col-1">
                        <span class="font-weight-bold">Peso </span>
                    </div>
                    <div class="col-1">
                        <span class="font-weight-bold">Peso Vol</span>
                    </div>
                    <div class="col-1">
                        <span class="font-weight-bold">Paquetes</span>
                    </div>
                    <div class="col-2">
                        <span class="font-weight-bold">Fecha-Creacion</span>
                    </div>
                </div>

                @foreach ($guias as $guia)
                <div class="row my-2">
                    <div class="col-1">
                        <input type="checkbox" class="text-center" id="{{$guia->id}}" name="guiasarray[]" value="{{$guia->id}}">
                        <span>{{$guia->id}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$guia->codigo}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$guia->user->username}}</span>
                    </div>
                    <div class="col-1">
                        <span>{{$guia->cod_origen}}</span>
                    </div>
                    <div class="col-1">
                        <span>{{$guia->cod_destino}}</span>
                    </div>
                    <div class="col-1">
                        <span>{{$guia->peso_total}}</span>
                    </div>
                    <div class="col-1">
                        <span>{{$guia->peso_volumetrico}}</span>
                    </div>
                    <div class="col-1">
                        <span>{{$guia->n_paquetes}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{$guia->created_at}}</span>
                    </div>
                </div>
                @endforeach

                <div class="row mt-4 pt-4">
                    <div class="col-4 text-center">
                        <label class="form-check-label" for="instalacion">Instalacion destino</label>
                        <select class="ml-4" name="instalacion_destino" id="instalacion_destino" required>
                            <option value="">Seleccione una sucursal</option>
                            @foreach ($instalaciones as $instalacion)
                                <option value="{{$instalacion->id}}">{{$instalacion->id}} / {{$instalacion->codigo}} / {{$instalacion->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 text-center">
                        <label class="form-check-label" for="vehiculo">Vehiculo</label><br>
                        <select class="ml-4" name="vehiculo" id="vehiculo" required>
                            <option value="">Seleccione un vehiculo</option>
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{$vehiculo->id}}">{{$vehiculo->id}} / {{$vehiculo->codigo}} / {{$vehiculo->placa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 text-center">
                        <label class="form-check-label" for="transportista">Transportista</label><br>
                        <select class="ml-4" name="transportista" id="transportista" required>
                            <option value="">Seleccione un Transportista</option>
                            @foreach ($transportistas as $transportista)
                                <option value="{{$transportista->id}}">{{$transportista->id}} / {{$transportista->documento}} / {{$transportista->nombres}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

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
