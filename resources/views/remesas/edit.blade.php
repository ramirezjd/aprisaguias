@extends('layouts.app')

@can('editar remesa')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6 margin-tb">
                    <h2>Editar Remesa</h2>
                </div>
                <div class="col-md-6 margin-tb text-right">
                    <a class="btn btn-primary" href="{{ route('remesas.index') }}">Volver</a>
                </div>
            </div>


            <form action="{{ route('remesas.update',$remesa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6 text-center">
                        <label class="form-check-label" for="vehiculo">Vehiculo</label><br>
                        <select class="ml-4" name="vehiculo" id="vehiculo" required>
                            <option value="">Seleccione un vehiculo</option>
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{$vehiculo->id}}">{{$vehiculo->id}} / {{$vehiculo->codigo}} / {{$vehiculo->placa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 text-center">
                        <label class="form-check-label" for="transportista">Transportista</label><br>
                        <select class="ml-4" name="transportista" id="transportista" required>
                            <option value="">Seleccione un Transportista</option>
                            @foreach ($transportistas as $transportista)
                                <option value="{{$transportista->id}}">{{$transportista->id}} / {{$transportista->documento}} / {{$transportista->nombres}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" defer>
            $( document ).ready(function() {
                $("#vehiculo").val('{{$remesa->vehiculo_id}}');
                $("#transportista").val('{{$remesa->transportista_id}}');
            });
        </script>
    @endsection
@endcan

@cannot('editar remesa')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
