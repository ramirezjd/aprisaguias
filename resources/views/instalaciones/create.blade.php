@extends('layouts.app')


@can('crear instalacion')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h1>Crear Nueva Instalacion</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('instalaciones.index') }}"> Volver</a>
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

    <form action="{{ route('instalaciones.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 margin-tb">
                <div class="form-group">
                    <strong>Nombre a mostrar:</strong>
                    <input class="form-control" name="descripcion" id="descripcion" placeholder="descripcion"></textarea>
                </div>
            </div>
            <div class="col-md-6 margin-tb">
                <strong>Tipo de instalacion:</strong><br>
                <select name="tipo_instalacion" id="tipo_instalacion" required>
                    <option value="">Seleccione un tipo de instalacion</option>
                    @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col margin-tb d-flex">
                <div class="form-group mx-2">
                    <strong>Estado:</strong><br>
                    <select name="estados" id="dropdownEstados" required>
                        <option value="">Seleccione un estado</option>
                        @foreach ($estados as $estados)
                        <option value="{{ $estados->id }}">{{ $estados->estado }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mx-2">
                    <strong>Municipio:</strong><br>
                    <select name="municipios" id="dropdownMunicipios" required>
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
                <div class="form-group mx-2">
                    <strong>Ciudad:</strong><br>
                    <select name="ciudades" id="dropdownCiudades" required>
                        <option value="">Seleccione una ciudad</option>
                    </select>
                </div>
                <div class="form-group mx-2">
                    <strong>Parroquia:</strong><br>
                    <select name="parroquias" id="dropdownParroquias" required>
                        <option value="">Seleccione una parroquia</option>
                    </select>
                </div>
                <div class="form-group mx-2">
                    <strong>Zona Postal:</strong><br>
                    <select name="zip_codes" id="dropdownZip_codes" required>
                        <option value="">Seleccione un codigo postal</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Urbanizacion:</strong>
                    <textarea class="form-control" rows="1" name="urbanizacion" id="urbanizacion" placeholder="urbanizacion" required></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Edificio / Casa:</strong>
                    <textarea class="form-control" rows="1" name="edificio_casa" id="edificio_casa" placeholder="Edificio / Casa" required></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="1" name="punto_referencia" id="punto_referencia" placeholder="Punto de Referencia" required></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <p><label class="form-check-label font-weight-bold" for="via_principal">Via Principal</label></p>
                    <select name="via_principal" id="via_principal" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
            </div>
        </div>
        </form>
    </div>

</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $( document ).ready(function() {


        $( '#dropdownParroquias' ).change(function(e) {

        var parroquia_id = e.target.value;
        //parroquia_request = e.target.value;

        $.ajax({
            url:"{{ route('getZipCodes') }}",
            method:"GET",
            data:{"parroquia_id":parroquia_id},
            dataType:"json",
            success:function(data){

                $('#dropdownZip_codes').empty();

                $('#dropdownZip_codes').append('<option value="">Seleccione una zona postal</option>');
                $('#dropdownZip_codes').append('<option value="'+data.id+'">'+data.zip_code+'</option>');


            },
            error: function (data) {
                alert('fail');
            }
            });

        });


        $( '#dropdownMunicipios' ).change(function(e) {

        var municipio_id = e.target.value;
        //municipio_request = e.target.value;

        $.ajax({
            url:"{{ route('getCiudades') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){

                $('#dropdownCiudades').empty();

                $('#dropdownCiudades').append('<option value="">Seleccione una ciudad</option>');


                $.each(data, function(i, id, ciudad) {
                    $('#dropdownCiudades').append('<option value="'+data[i].id+'">'+data[i].ciudad+'</option>');
                });
            },
            error: function (data) {
                alert('fail');
            }
            });

            $.ajax({
            url:"{{ route('getParroquias') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){

                $('#dropdownParroquias').empty();

                $('#dropdownParroquias').append('<option value="">Seleccione una parroquia</option>');

                $.each(data, function(i, id, parroquia) {
                    $('#dropdownParroquias').append('<option value="'+data[i].id+'">'+data[i].parroquia+'</option>');
                });
            },
            error: function (data) {
                alert('fail');
            }
            });

        });

        $( '#dropdownEstados' ).change(function(e) {

            var estado_id = e.target.value;
            //estado_request = e.target.value;

            $.ajax({
            url:"{{ route('getMunicipios') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
            success:function(data){

                $('#dropdownMunicipios').empty();

                $('#dropdownMunicipios').append('<option value="">Seleccione un municipio</option>');

                $.each(data, function(i, id, municipio) {
                    $('#dropdownMunicipios').append('<option value="'+data[i].id+'">'+data[i].municipio+'</option>');
                });
            },
            error: function (data) {
                alert('fail');
            }
            });


        });

    });
</script>
@endsection
@endcan

@cannot('crear instalacion')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
