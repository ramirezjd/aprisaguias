@extends('permissions.layout')


@can('crear remesa')
    @section('content')
        <div class="container">
            <h1>Crear Usuario</h1>
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
                <div class="row">
                    <div class="col-2">
                        <input type="checkbox" class="form-check-input" id="{{$guia->id}}" name="guiasarray[]" value="{{$guia->id}}">
                    </div>
                    <div class="col-2">
                        <span>{{$guia->codigo}}</span>
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
                @endforeach


                <div class="row">
                    <!--Roles -->
                    <div class="col -6">
                        <label class="form-check-label" for="roles">Cargo</label>
                        <select class="ml-4" name="roles" id="roles">
                            <option value="0">Seleccione un cargo</option>
                            @foreach ($roles as $role)
                            <div class="col-3">
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            </div>
                            @endforeach
                        </select>
                    </div>

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
