@extends('guias.layout')

@can('crear guia')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h1>Crear Nueva Guía</h2>
            </div>
        </div>
        <div class="col-6 text-right my-auto">
                <a class="btn btn-primary" href="{{ route('guias.index') }}"> Volver</a>
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
        <hr>

        <div class="row">
            <div class="col-4 my-3">
                <h3 class="h3 my-3">Datos Basicos de la Guia</h3>
                <input name="codigo" type="hidden" value="{{ $rand = substr(md5(microtime()),rand(0,26),7) }}">

                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="num" name="price_package" class="form-control" required>
                </div>

                <div class="form-group">
                    <strong>Fecha Creación:</strong>
                    <input type="date" name="date_creation" class="form-control" disabled
                    value="{{ $today = date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <span><strong>Tipo de destino:</strong></span><br>
                    <select name="type_destiny" id="tipoDestinos" required>
                        <option value="">Seleccione...</option>
                        <option value="1">Aliado Comercial</option>
                        <option value="2">Oficina</option>
                        <option value="3">Domicilio</option>
                    </select>
                </div>

                <div class="form-group">
                    <span><strong>Tipo de pago:</strong></span><br>
                    <select name="type_payment" id="tipoPago" required>
                        <option value="">Seleccione...</option>
                        <option value="1">Efectivo</option>
                        <option value="2">Transferencia</option>
                    </select>
                </div>

            </div>

            <div class="col-4 my-3">
                <h3 class="h3 my-3">Sucursal origen</h3>

                <div class="form-group">
                    <strong class="mr-3">Instalacion:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->codigo }}" disabled>
                    <input type="hidden" name="cod_origen" value="{{ $instalacion_origen->codigo }}">
                    <input type="hidden" name="instalacion_origen" value="{{ $instalacion_origen->id }}">

                </div>
                <div class="form-group">
                    <strong class="mr-3">Estado:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->estado->estado }}" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Municipio:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->municipio->municipio }}" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Ciudad:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->ciudad->ciudad }}" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Parroquia:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->parroquia->parroquia }}" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Zona Postal:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->zip_code->zip_code }}" disabled>
                </div>
            </div>
            <div class="col-4 my-3">
                <h3 class="h3 my-3">Sucursal destino</h3>

                <div class="form-group">
                <strong class="mr-3">Instalacion:</strong>
                <select name="instalacion_destino" id="instalacion_destino" required>
                <option value="">Seleccione una instalacion</option>
                    @foreach ($instalaciones as $instalacion)
                    <option value="{{ $instalacion->id }}" data-name="{{ $instalacion->codigo }}">{{ $instalacion->codigo }}</option>
                    @endforeach
                </select>
                </div>

                <div class="form-group">
                    <strong class="mr-3">Estado:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_estado" name="destino_estado" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Municipio:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_municipio" name="destino_municipio" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Ciudad:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_ciudad" name="destino_ciudad" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Parroquia:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_parroquia" name="destino_parroquia" disabled>
                </div>
                <div class="form-group ">
                    <strong  class="mr-3">Zona Postal:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_zip_code" name="destino_zip_code" disabled>
                </div>
            </div>
        </div>



        <hr>
        <div class="package_data">
            <div class="row my-4">
                <div class="col-6">
                    <label class="h3" for="base-data">Datos Paquete</label>
                </div>
                <div class="col-6 text-right">
                    <button type="button" id="btnAdd" class="btn btn-primary" >Añadir un paquete</button>
                </div>
            </div>


            <div class="row group my-3 ">
                <div class="mr-4 col-xs-4 col-sm-12 col-md-2">
                    <div class="form-group mr-4">
                        <strong>Tipo:</strong><br>
                        <select name="type_package[]" id="tipoPaquete" required>
                            <option value="">Seleccione...</option>
                            <option value="1">Empaque</option>
                            <option value="2">Sobre</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2">
                    <div class="">
                        <strong>Peso (KG):</strong>
                        <input type="num" name="weight_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2">
                    <div class="form-group">
                        <strong>Ancho (CM):</strong>
                        <input type="num" name="width_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2">
                    <div class="form-group">
                        <strong>Alto (CM):</strong>
                        <input type="num" name="height_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2">
                    <div class="form-group">
                        <strong>Largo (CM):</strong>
                        <input type="num" name="deep_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-4 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Descripción Paquete:</strong>
                        <input type="text" name="description_pack[]" class="form-control">
                    </div>
                </div>

                <div class="pull-right my-auto">
                    <button type="button" class="btn btn-primary btnRemove" >Remover Campo</button>
                </div>

            </div>
            <div class="row">

            </div>
        </div>

        <hr>

        <label class="h3 mb-3" for="locations">Remitente</label><br>

        <h5 class="h5 mb-3">Datos Personales</h5>
        <div class="row mb-3">

            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>CI/RIF:</strong>
                    <input type="text" name="id_sender" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>E-Mail Sender:</strong>
                    <input type="mail" name="mail_sender" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Nombre/Razón Social:</strong>
                    <input type="text" name="name_sender" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="phone_sender" class="form-control" required>
                </div>
            </div>
        </div>
        <h5 class="h5 mb-3">Direccion</h5>
        <div class="row mb-3">
            <div class="col-xs-3 col-sm-12 col-md-2">
                <div class="form-group">
                    <span><strong>Estados:</strong></span><br>
                    <select name="estados" id="dropdownEstados" required>
                        <option value="">Seleccione un estado</option>
                        @foreach ($estados as $edo)
                        <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-2 mr-4">
                <div class="form-group">
                    <span><strong>Municipios:</strong></span><br>
                    <select name="municipios" id="dropdownMunicipios" required>
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-2 mr-4">
                <div class="form-group">
                    <span><strong>Ciudades:</strong></span><br>
                    <select name="ciudades" id="dropdownCiudades" required>
                        <option value="">Seleccione una ciudad</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-2 mr-4">
                <div class="form-group">
                    <span><strong>Parroquias:</strong></span><br>
                    <select name="parroquias" id="dropdownParroquias" required>
                        <option value="">Seleccione una parroquia</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-2 text-left">
                <div class="form-group">
                    <span><strong>Zona Postal:</strong></span><br>
                    <select name="zip_codes" id="dropdownZip_codes" required>
                        <option value="">Seleccione un codigo postal</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" class="form-control" name="address_sender">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Urbanización:</strong>
                    <input type="text" class="form-control" name="urban_sender">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Edificio/Casa:</strong>
                    <input type="text" class="form-control" name="house_sender">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="1" name="reference_sender" placeholder="Punto de Referencia"></textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <!-- <strong>Estado:</strong> -->
                    <!-- <input type="text" class="form-control" name="state_sender" disabled> -->
                    <input type="hidden" name="state_sender_id">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <!-- <strong>Municipio:</strong> -->
                    <!-- <input type="text" class="form-control" name="province_sender" disabled> -->
                    <input type="hidden" name="province_sender_id" disabled>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <!-- <strong>Ciudad:</strong> -->
                    <!-- <input type="text" class="form-control" name="city_sender" disabled> -->
                    <input type="hidden" name="city_sender_id" disabled>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <!-- <strong>Parroquia:</strong> -->
                    <!-- <input type="text" class="form-control" name="parroq_sender" disabled> -->
                    <input type="hidden" name="parroq_sender_id" disabled>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <!-- <strong>Zona Postal:</strong> -->
                    <!-- <input type="text" class="form-control" name="zip_sender" disabled> -->
                    <input type="hidden" name="zip_sender_id" disabled>
                </div>
            </div>
        </div>

        <hr>

        <label class="h3 mb-3" for="receiver-package">Destinatario</label>
        <h5 class="h5 mb-3">Datos Personales</h5>
        <div class="row">
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>CI/RIF:</strong>
                    <input type="text" name="id_receiver" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>E-Mail Sender:</strong>
                    <input type="mail" name="mail_receiver" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Nombre/Razón Social:</strong>
                    <input type="text" name="name_receiver" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="phone_receiver" class="form-control" required>
                </div>
            </div>
        </div>
        <h5 class="h5 mb-3">Direccion</h5>
        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <select name="state_receiver" id="selectEdo" required>
                        <option value="">Seleccione un estado</option>
                        @foreach ($estados as $edo)
                        <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-2 mr-4">
                <div class="form-group">
                    <strong>Municipio:</strong>
                    <select name="province_receiver" id="selectProv" required>
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-2 mr-4">
                <div class="form-group">
                    <strong>Ciudad:</strong>
                    <select name="city_receiver" id="selecCity" required>
                        <option value="">Seleccione una ciudad</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-2 mr-4">
                <div class="form-group">
                    <strong>Parroquia:</strong>
                    <select name="parroq_receiver" id="selectParroq" required>
                        <option value="">Seleccione una parroquia</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-4 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Zona Postal:</strong>
                    <select name="zip_receiver" id="selectZip" required>
                        <option value="">Seleccione un codigo postal</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" class="form-control" name="address_receiver">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Urbanización:</strong>
                    <input type="text" class="form-control" name="urban_receiver">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Edificio/Casa:</strong>
                    <input type="text" class="form-control" name="house_receiver">
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="1" name="reference_receiver" placeholder="Punto de Referencia"></textarea>
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

        $('select#instalacion_destino').on('change', function(e) {
            var finded = 0;
            @foreach ($instalaciones as $instalacion)
                var instalacion_id = {{$instalacion->id}};
                if (instalacion_id == $('select#instalacion_destino option:checked' ).val()) {
                    $('#destino_estado').val('{{$instalacion->estado->estado}}');
                    $('#destino_municipio').val('{{$instalacion->municipio->municipio}}');
                    $('#destino_ciudad').val('{{$instalacion->ciudad->ciudad}}');
                    $('#destino_parroquia').val('{{$instalacion->parroquia->parroquia}}');
                    $('#destino_zip_code').val('{{$instalacion->zip_code->zip_code}}');
                    finded = 1;
                }
            @endforeach

            if(finded == 0){
                $('#destino_estado').val('');
                $('#destino_municipio').val('');
                $('#destino_ciudad').val('');
                $('#destino_parroquia').val('');
                $('#destino_zip_code').val('');
            }
        });

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
@endcan

@cannot('crear guia')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
