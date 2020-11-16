@extends('guias.layout')

@section('content')
<div class="container">
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
        <label for="base-data">Datos Basicos</label>
        <div class="row">
            <input name="codigo" type="hidden" value="{{ $rand = substr(md5(microtime()),rand(0,26),7) }}">

            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="num" name="price_package" class="form-control">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Fecha Creación:</strong>
                    <input type="date" name="date_creation" class="form-control" disabled
                    value="{{ $today = date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Fecha Entrega:</strong>
                    <input type="date" name="date_deliver" class="form-control">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <select name="type_destiny" id="tipoDestinos">
                        <option value="0">Seleccione...</option>
                        <option value="1">Aliado Comercial</option>
                        <option value="2">Oficina</option>
                        <option value="3">Domicilio</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <select name="type_payment" id="tipoPago">
                        <option value="0">Seleccione...</option>
                        <option value="1">Efectivo</option>
                        <option value="2">Transferencia</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="package_data">
            <div class="pull-right">
                <button type="button" id="btnAdd" class="btn btn-primary" >Más Paquetes...</button>
            </div>
            <label for="base-data">Datos Paquete</label>
            <div class="row group">
                <div class="col-xs-3 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Peso:</strong>
                        <input type="num" name="weight_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Ancho:</strong>
                        <input type="num" name="width_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Alto:</strong>
                        <input type="num" name="height_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Profundidad:</strong>
                        <input type="num" name="deep_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-4 col-sm-12 col-md-4">
                    <div class="form-group">
                        <strong>Descripción Paquete:</strong>
                        <input type="text" name="description_pack[]" class="form-control">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-12 col-md-4">
                    <div class="form-group">
                        <select name="type_package[]" id="tipoPaquete">
                            <option value="0">Seleccione...</option>
                            <option value="1">Empaque</option>
                            <option value="2">Sobre</option>
                        </select>
                    </div>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary btnRemove" >Remover Campo</button>
                </div>
            </div>
        </div>
        
        <label for="locations">Ubicaciones</label>
        <div class="row">
            <div class="col-xs-3 col-sm-12 col-md-3">
                <div class="form-group">
                    <select name="estados" id="dropdownEstados">
                        <option value="Seleccione un estado">Seleccione un estado</option>
                        @foreach ($estados as $edo)
                        <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-3">
                <div class="form-group">
                    <select name="municipios" id="dropdownMunicipios">
                        <option value="0">Seleccione un municipio</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-3">
                <div class="form-group">
                    <select name="ciudades" id="dropdownCiudades">
                        <option value="0">Seleccione una ciudad</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-3">
                <div class="form-group">
                    <select name="parroquias" id="dropdownParroquias">
                        <option value="0">Seleccione una parroquia</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-3">
                <div class="form-group">
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
                    <select name="state_receiver" id="selectEdo">
                        <option value="Seleccione un estado">Seleccione un estado</option>
                        @foreach ($estados as $edo)
                        <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Municipio:</strong>
                    <select name="province_receiver" id="selectProv">
                        <option value="0">Seleccione un municipio</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Ciudad:</strong>
                    <select name="city_receiver" id="selecCity">
                        <option value="0">Seleccione una ciudad</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Parroquia:</strong>
                    <select name="parroq_receiver" id="selectParroq">
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
                    <select name="zip_receiver" id="selectZip">
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
</div>
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
        });
        $('select#dropdownMunicipios').on('change', function(e) {
            var valueMunicipios = $('#dropdownMunicipios').find(":selected").data('name');
            var idMunicipios = $('#dropdownMunicipios').val();
            $('[name="province_sender"]').val(valueMunicipios)
            $('[name="province_sender_id"]').val(idMunicipios)
        });
        $('select#dropdownCiudades').on('change', function(e) {
            var valueCiudades = $('#dropdownCiudades').find(":selected").data('name');
            var idCiudades = $('#dropdownCiudades').val();
            $('[name="city_sender"]').val(valueCiudades)
            $('[name="city_sender_id"]').val(idCiudades)
        });
        $('select#dropdownParroquias').on('change', function(e) {
            var valueParroquias = $('#dropdownParroquias').find(":selected").data('name');
            var idParroquias = $('#dropdownParroquias').val();
            $('[name="parroq_sender"]').val(valueParroquias)
            $('[name="parroq_sender_id"]').val(idParroquias)
        });
        $('select#dropdownZip_codes').on('change', function(e) {
            var ValueZip = $('#dropdownZip_codes').find(":selected").data('name');
            var idZip = $('#dropdownZip_codes').val();
            $('[name="zip_sender"]').val(ValueZip)
            $('[name="zip_sender_id"]').val(idZip)
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



        $( '#selectEdo' ).change(function(e) {

            var estado_id = e.target.value;

            $.ajax({
            url:"{{ route('request_estado') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
                success:function(data){
                    $('#selectProv').empty();
                    $('#selectProv').append('<option value="'+0+'">Seleccione un municipio</option>');
                    $.each(data, function(i, id, municipio) {
                        $('#selectProv').append('<option value="'+data[i].id+'" data-name="'+data[i].municipio+'">'+data[i].municipio+'</option>');
                    });
                }
            });
        });

        $( '#selectProv' ).change(function(e) {

            var municipio_id = e.target.value;

            $.ajax({
                url:"{{ route('request_municipio') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){
                    $('#selecCity').empty();
                    $('#selecCity').append('<option value="'+0+'">Seleccione una ciudad</option>');
                    $.each(data, function(i, id, ciudad) {
                        $('#selecCity').append('<option value="'+data[i].id+'" data-name="'+data[i].ciudad+'">'+data[i].ciudad+'</option>');
                    });
                }
            });

            $.ajax({
                url:"{{ route('request_ciudad') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){
                    $('#selectParroq').empty();
                    $('#selectParroq').append('<option value="'+0+'">Seleccione una parroquia</option>');
                    $.each(data, function(i, id, parroquia) {
                        $('#selectParroq').append('<option value="'+data[i].id+'" data-name="'+data[i].parroquia+'">'+data[i].parroquia+'</option>');
                    });
                }
            });
        });

        $( '#selectParroq' ).change(function(e) {

            var parroquia_id = e.target.value;

            $.ajax({
                url:"{{ route('request_parroquia') }}",
                method:"GET",
                data:{"parroquia_id":parroquia_id},
                dataType:"json",
                success:function(data){
                    $('#selectZip').empty();
                    $('#selectZip').append('<option value="'+0+'">Seleccione una zona postal</option>');
                    $('#selectZip').append('<option value="'+data.id+'" data-name="'+data.zip_code+'">'+data.zip_code+'</option>');
                }
            });
        });
        
        $('.package_data').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove'
        });

    });
</script>

@endsection
