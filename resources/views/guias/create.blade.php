@extends('guias.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear Nueva Guía</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('guias.index') }}"> Back</a>
        </div>
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

<form action="{{ route('guias.store') }}" method="POST">
    @csrf
    <input name="codigo" type="hidden" value="xm234jq">
    <label for="base-data">Datos Basicos</label>
    <div class="row">
    </div>
    
    <label for="locations">Ubicaciones</label>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <select name="estados" id="dropdownEstados">
                    <option value="Seleccione un estado">Seleccione un estado</option>
                    @foreach ($estados as $edo)
                    <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
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
            </div>
        </div>
    </div>

    <label for="sender-package">Remitente</label>
     <div class="row">
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>CI/RIF:</strong>
                <input type="text" name="id_sender" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>E-Mail Sender:</strong>
                <input type="mail" name="mail_sender" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Nombre/Razón Social:</strong>
                <input type="text" name="name_sender" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Teléfono:</strong>
                <input type="text" name="phone_sender" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Dirección:</strong>
                <input type="text" class="form-control" name="address_sender">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Estado:</strong>
                <input type="text" class="form-control" name="state_sender">
                <input type="hidden" name="state_sender_id">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Municipio:</strong>
                <input type="text" class="form-control" name="province_sender">
                <input type="hidden" name="province_sender_id">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Ciudad:</strong>
                <input type="text" class="form-control" name="city_sender">
                <input type="hidden" name="city_sender_id">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Urbanización:</strong>
                <input type="text" class="form-control" name="urban_sender">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Parroquia:</strong>
                <input type="text" class="form-control" name="parroq_sender">
                <input type="hidden" name="parroq_sender_id">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Edificio/Casa:</strong>
                <input type="text" class="form-control" name="house_sender">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Zona Postal:</strong>
                <input type="text" class="form-control" name="zip_sender">
                <input type="hidden" name="zip_sender_id">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Punto de Referencia:</strong>
                <textarea class="form-control" rows="5" name="reference_sender" placeholder="Punto de Referencia"></textarea>
            </div>
        </div>
    </div>

    <label for="receiver-package">Destinatario</label>
     <div class="row">
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>CI/RIF:</strong>
                <input type="text" name="id_receiver" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>E-Mail Sender:</strong>
                <input type="mail" name="mail_receiver" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Nombre/Razón Social:</strong>
                <input type="text" name="name_receiver" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Teléfono:</strong>
                <input type="text" name="phone_receiver" class="form-control">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Dirección:</strong>
                <input type="text" class="form-control" name="address_receiver">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Estado:</strong>
                <select name="state_receiver" id="dropdownEstados">
                    <option value="Seleccione un estado">Seleccione un estado</option>
                    @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}" data-name="{{ $estado->estado }}">{{ $estado->estado }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Municipio:</strong>
                <select name="province_receiver" id="dropdownMunicipios">
                    <option value="0">Seleccione un municipio</option>
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Ciudad:</strong>
                <select name="city_receiver" id="dropdownCiudades">
                    <option value="0">Seleccione una ciudad</option>
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Parroquia:</strong>
                <select name="parroq_receiver" id="dropdownParroquias">
                    <option value="0">Seleccione una parroquia</option>
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Urbanización:</strong>
                <input type="text" class="form-control" name="urban_receiver">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Edificio/Casa:</strong>
                <input type="text" class="form-control" name="house_receiver">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Zona Postal:</strong>
                <select name="zip_receiver" id="dropdownZip_codes">
                    <option value="0">Seleccione un codigo postal</option>
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Punto de Referencia:</strong>
                <textarea class="form-control" rows="5" name="reference_receiver" placeholder="Punto de Referencia"></textarea>
            </div>
        </div>
    </div>

    
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $( document ).ready(function() {
        $('select#dropdownEstados').on('change', function(e) {
            var valueEstados = $('#dropdownEstados').find(":selected").data('name');
            var idEstados = $('#dropdownEstados').val();
            $('[name="state_sender"]').val(valueEstados)
            $('[name="state_sender_id"]').val(idEstados)
            console.log("Name of municipios:", valueEstados);
            console.log("Id de los estados", idEstados);
        });
        $('select#dropdownMunicipios').on('change', function(e) {
            var valueMunicipios = $('#dropdownMunicipios').find(":selected").data('name');
            var idMunicipios = $('#dropdownMunicipios').val();
            $('[name="province_sender"]').val(valueMunicipios)
            $('[name="province_sender_id"]').val(idMunicipios)
            console.log("Name of municipios:", valueMunicipios);
        });
        $('select#dropdownCiudades').on('change', function(e) {
            var valueCiudades = $('#dropdownCiudades').find(":selected").data('name');
            var idCiudades = $('#dropdownCiudades').val();
            $('[name="city_sender"]').val(valueCiudades)
            $('[name="city_sender_id"]').val(idCiudades)
            console.log("Name of municipios:", valueCiudades);
        });
        $('select#dropdownParroquias').on('change', function(e) {
            var valueParroquias = $('#dropdownParroquias').find(":selected").data('name');
            var idParroquias = $('#dropdownParroquias').val();
            $('[name="parroq_sender"]').val(valueParroquias)
            $('[name="parroq_sender_id"]').val(idParroquias)
            console.log("Name of municipios:", valueParroquias);
        });
        $('select#dropdownZip_codes').on('change', function(e) {
            var ValueZip = $('#dropdownZip_codes').find(":selected").data('name');
            var idZip = $('#dropdownZip_codes').val();
            $('[name="zip_sender"]').val(ValueZip)
            $('[name="zip_sender_id"]').val(idZip)
            
            console.log("Name of municipios:", ValueZip);
        });

        $( '#dropdownParroquias' ).change(function(e) {

        var parroquia_id = e.target.value;

        $.ajax({
            url:"{{ route('request_parroquia') }}",
            method:"GET",
            data:{"parroquia_id":parroquia_id},
            dataType:"json",
            success:function(data){

                $('#dropdownZip_codes').empty();

                $('#dropdownZip_codes').append('<option value="'+0+'">Seleccione una zona postal</option>');
                $('#dropdownZip_codes').append('<option value="'+data.id+'" data-name="'+data.zip_code+'">'+data.zip_code+'</option>');


            },
            error: function (data) {
                console.log('fail', data);
            }
            });

        });


        $( '#dropdownMunicipios' ).change(function(e) {

        var municipio_id = e.target.value;
        console.log('municipio_id', municipio_id);

        $.ajax({
            url:"{{ route('request_municipio') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){

                $('#dropdownCiudades').empty();

                $('#dropdownCiudades').append('<option value="'+0+'">Seleccione una ciudad</option>');


                $.each(data, function(i, id, ciudad) {
                    $('#dropdownCiudades').append('<option value="'+data[i].id+'" data-name="'+data[i].ciudad+'">'+data[i].ciudad+'</option>');
                });
            },
            error: function (data) {
                console.log('fail', data);
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
                    $('#dropdownParroquias').append('<option value="'+data[i].id+'" data-name="'+data[i].parroquia+'">'+data[i].parroquia+'</option>');
                });
            },
            error: function (data) {
                console.log('fail', data);
            }
            });

        });

        $( '#dropdownEstados' ).change(function(e) {

            var estado_id = e.target.value;

            $.ajax({
            url:"{{ route('request_estado') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
            success:function(data){

                $('#dropdownMunicipios').empty();

                $('#dropdownMunicipios').append('<option value="'+0+'">Seleccione un municipio</option>');


                $.each(data, function(i, id, municipio) {
                    $('#dropdownMunicipios').append('<option value="'+data[i].id+'" data-name="'+data[i].municipio+'">'+data[i].municipio+'</option>');
                });
            },
            error: function (data) {
                console.log('fail', data);
            }
            });
        });



    });
</script>

@endsection
