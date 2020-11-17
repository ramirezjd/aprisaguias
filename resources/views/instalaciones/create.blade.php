@extends('instalaciones.layout')


@can('crear instalacion')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New guia</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('guias.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('instalaciones.store') }}" method="POST">
            @csrf
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br>
                    <div class="form-group">
                        <strong>Nombre a mostrar:</strong>
                        <input class="form-control" name="descripcion" id="descripcion" placeholder="descripcion"></textarea>
                    </div>

                    <br>
                    <select name="tipo_instalacion" id="tipo_instalacion">
                        <option value="Seleccione un tipo de instalacion">Seleccione un tipo de instalacion</option>
                        @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                    <br><br>
                    <select name="estados" id="dropdownEstados">
                        <option value="Seleccione un estado">Seleccione un estado</option>
                        @foreach ($estados as $estados)
                        <option value="{{ $estados->id }}">{{ $estados->estado }}</option>
                        @endforeach
                    </select>

                    <select name="municipios" id="dropdownMunicipios">
                        <option value="0">Seleccione un municipio</option>
                    </select>

                    <select name="ciudades" id="dropdownCiudades">
                        <option value="0">Seleccione una ciudad</option>
                    </select>

                    <select name="parroquias" id="dropdownParroquias">
                        <option value="0">Seleccione una parroquia</option>
                    </select>

                    <select name="zip_codes" id="dropdownZip_codes">
                        <option value="0">Seleccione un codigo postal</option>
                    </select>
                    <br><br>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Urbanizacion:</strong>
                    <textarea class="form-control" rows="1" name="urbanizacion" id="urbanizacion" placeholder="urbanizacion"></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Edificio / Casa:</strong>
                    <textarea class="form-control" rows="1" name="edificio_casa" id="edificio_casa" placeholder="Edificio / Casa"></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="1" name="punto_referencia" id="punto_referencia" placeholder="Punto de Referencia"></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <p><label class="form-check-label" for="via_principal">Via Principal</label></p>
                    <select name="via_principal" id="via_principal">
                        <option value="0">Seleccione una opcion</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
            </div>
        </div>
        </form>

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
                    url:"{{ route('request_parroquia') }}",
                    method:"GET",
                    data:{"parroquia_id":parroquia_id},
                    dataType:"json",
                    success:function(data){

                        $('#dropdownZip_codes').empty();

                        $('#dropdownZip_codes').append('<option value="'+0+'">Seleccione una zona postal</option>');
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
                    url:"{{ route('request_municipio') }}",
                    method:"GET",
                    data:{"municipio_id":municipio_id},
                    dataType:"json",
                    success:function(data){

                        $('#dropdownCiudades').empty();

                        $('#dropdownCiudades').append('<option value="'+0+'">Seleccione una ciudad</option>');


                        $.each(data, function(i, id, ciudad) {
                            $('#dropdownCiudades').append('<option value="'+data[i].id+'">'+data[i].ciudad+'</option>');
                        });
                    },
                    error: function (data) {
                        alert('fail');
                    }
                    });

                    $.ajax({
                    url:"{{ route('request_ciudad') }}",
                    method:"GET",
                    data:{"municipio_id":municipio_id},
                    dataType:"json",
                    success:function(data){

                        $('#dropdownParroquias').empty();

                        $('#dropdownParroquias').append('<option value="'+0+'">Seleccione una parroquia</option>');

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
                    url:"{{ route('request_estado') }}",
                    method:"GET",
                    data:{"estado_id":estado_id},
                    dataType:"json",
                    success:function(data){

                        $('#dropdownMunicipios').empty();

                        $('#dropdownMunicipios').append('<option value="'+0+'">Seleccione un municipio</option>');

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

@cannot('crear instalacion'){
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
