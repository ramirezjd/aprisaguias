@extends('layouts.app')

@can('crear guia')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6 margin-tb">
            <div class="pull-left">
                <h1>Crear Nueva Guía</h2>
            </div>
        </div>
        <div class="col-md-6 text-right my-auto">
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
            <div class="col-md-4 my-3">
                <h3 class="h3 my-3">Datos Basicos de la Guia</h3>
                <input name="codigo" type="hidden" value="{{ $rand = substr(md5(microtime()),rand(0,26),7) }}">

                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="text" disabled name="price_package" id="price_package" class="form-control" required>
                </div>

                <div class="form-group d-none">
                    <strong>Fecha Creación:</strong>
                    <input type="date" name="date_creation" class="form-control" disabled
                    value="{{ $today = date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <span><strong>Tipo de destino:</strong></span><br>
                    <select name="type_destiny" id="tipoDestinos" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="1">Aliado Comercial</option>
                        <option value="2">Oficina</option>
                        <option value="3">Domicilio</option>
                    </select>
                </div>

                <div class="form-group">
                    <span><strong>Tipo de pago:</strong></span><br>
                    <select name="type_payment" id="tipoPago" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="1">Efectivo</option>
                        <option value="2">Transferencia</option>
                    </select>
                </div>

            </div>

            <div class="col-md-4 my-3 px-md-5">
                <h3 class="h3 my-3">Sucursal origen</h3>

                <div class="form-group d-flex justify-content-between">
                    <strong class="mr-3">Instalacion:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->codigo }}" disabled>
                    <input type="hidden" name="cod_origen" value="{{ $instalacion_origen->codigo }}">
                    <input type="hidden" name="instalacion_origen" value="{{ $instalacion_origen->id }}">
                </div>
                <div class="form-group d-flex justify-content-between">
                    <strong class="mr-3">Estado:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->estado->estado }}" disabled>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <strong  class="mr-3">Municipio:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->municipio->municipio }}" disabled>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <strong  class="mr-3">Ciudad:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->ciudad->ciudad }}" disabled>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <strong  class="mr-3">Parroquia:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->parroquia->parroquia }}" disabled>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <strong  class="mr-3">Zona Postal:</strong>
                    <input class="my-1" type="text" class="form-control" value="{{ $instalacion_origen->zip_code->zip_code }}" disabled>
                </div>
            </div>
            <div class="col-md-4 my-3 px-md-5">
                <h3 class="h3 my-3">Sucursal destino</h3>

                <div class="form-group  d-flex justify-content-between">
                <strong class="mr-3">Instalacion:</strong>
                <select name="instalacion_destino" id="instalacion_destino" class="form-control" required>
                <option value="">Seleccione una instalacion</option>
                    @foreach ($instalaciones as $instalacion)
                    <option value="{{ $instalacion->id }}" data-name="{{ $instalacion->codigo }}">{{ $instalacion->codigo }}</option>
                    @endforeach
                </select>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <strong class="mr-3">Estado:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_estado" name="destino_estado" disabled>
                </div>
                <div class="form-group d-flex justify-content-between ">
                    <strong  class="mr-3">Municipio:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_municipio" name="destino_municipio" disabled>
                </div>
                <div class="form-group d-flex justify-content-between ">
                    <strong  class="mr-3">Ciudad:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_ciudad" name="destino_ciudad" disabled>
                </div>
                <div class="form-group d-flex justify-content-between ">
                    <strong  class="mr-3">Parroquia:</strong>
                    <input class="my-1" type="text" class="form-control" id="destino_parroquia" name="destino_parroquia" disabled>
                </div>
                <div class="form-group d-flex justify-content-between ">
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
                        <select name="type_package[]" id="tipoPaquete[]" class="form-control type_package" required>
                            <option value="">Seleccione...</option>
                            @foreach ($tipo_paquetes as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2 d-none">
                    <div class="">
                        <strong>Peso (KG):</strong>
                        <input type="num" name="weight_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2 d-none">
                    <div class="form-group">
                        <strong>Ancho (CM):</strong>
                        <input type="num" name="width_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2 d-none">
                    <div class="form-group">
                        <strong>Alto (CM):</strong>
                        <input type="num" name="height_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-3 col-sm-12 col-md-2 d-none">
                    <div class="form-group">
                        <strong>Largo (CM):</strong>
                        <input type="num" name="deep_pack[]" class="form-control">
                    </div>
                </div>

                <div class="col-xs-4 col-sm-12 col-md-3 d-none">
                    <div class="form-group">
                        <strong>Descripción Paquete:</strong>
                        <input type="text" name="description_pack[]" class="form-control">
                    </div>
                </div>

                <div class="pull-right my-auto">
                    <button type="button" class="btn btn-primary btnRemove" >Remover Campo</button>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <button type="button" id="calcular_precio" class="btn btn-primary" >Calcular Precio</button>
            </div>
        </div>

        <hr>

        <label class="h3 mb-3" for="locations">Remitente</label><br>

        <h5 class="h5 mb-3">Datos Personales</h5>
        <div class="row mb-3">

            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>CI/RIF:</strong>
                    <div class="d-flex">
                        <input type="text" name="id_sender" id="id_sender" class="form-control w-75"  required>
                        <a class="btn btn-primary" id="user_create_sender"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-primary" id="user_search_sender"><i class="fas fa-search"></i></a>
                        <a class="btn btn-primary" hidden="true" id="user_edit_sender"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>E-Mail Sender:</strong>
                    <input type="mail" name="mail_sender" id="mail_sender" class="form-control" disabled required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Nombre/Razón Social:</strong>
                    <input type="text" name="name_sender" id="name_sender" class="form-control" disabled required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="phone_sender" id="phone_sender" class="form-control" disabled required>
                </div>
            </div>
        </div>
        <h5 class="h5 mb-3">Direccion</h5>
        <div class="row mb-3">
            <div class="col-xs-3 col-sm-12 col-md-2">
                <div class="form-group">
                    <span><strong>Estados:</strong></span><br>
                    <select name="estados" id="dropdownEstados" class="form-control w-100" disabled required>
                        <option value="">Seleccione un estado</option>
                        @foreach ($estados as $edo)
                        <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-3 ">
                <div class="form-group">
                    <span><strong>Municipios:</strong></span><br>
                    <select name="municipios" id="dropdownMunicipios" class="form-control w-100" disabled required>
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-3 ">
                <div class="form-group">
                    <span><strong>Ciudades:</strong></span><br>
                    <select name="ciudades" id="dropdownCiudades" class="form-control w-100" disabled required>
                        <option value="">Seleccione una ciudad</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-2 ">
                <div class="form-group">
                    <span><strong>Parroquias:</strong></span><br>
                    <select name="parroquias" id="dropdownParroquias" class="form-control w-100" disabled required>
                        <option value="">Seleccione una parroquia</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-3 col-sm-12 col-md-2 text-left">
                <div class="form-group">
                    <span><strong>Zona Postal:</strong></span><br>
                    <select name="zip_codes" id="dropdownZip_codes" class="form-control w-100" disabled required>
                        <option value="">Codigo postal</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Urbanización:</strong>
                    <input type="text" class="form-control" name="urban_sender" id="urban_sender" disabled>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Edificio/Casa:</strong>
                    <input type="text" class="form-control" name="house_sender" id="house_sender" disabled>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Via Principal:</strong>
                    <select name="address_sender" id="address_sender" class="form-control" disabled required>
                        <option value="">Seleccione una opcion</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="1" name="reference_sender" id="reference_sender" placeholder="Punto de Referencia" disabled></textarea>
                </div>
            </div>

        </div>

        <hr>

        <label class="h3 mb-3" for="receiver-package">Destinatario</label>
        <h5 class="h5 mb-3">Datos Personales</h5>
        <div class="row">
            <div class="col-xs-4 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>CI/RIF:</strong>
                    <div class="d-flex">
                        <input type="text" name="id_receiver" id="id_receiver" class="form-control w-75" required>
                        <a class="btn btn-primary" id="user_create_receiver"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-primary" id="user_search_receiver"><i class="fas fa-search"></i></a>
                        <a class="btn btn-primary" hidden="true" id="user_edit_receiver"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>E-Mail Sender:</strong>
                    <input type="mail" name="mail_receiver" id="mail_receiver" class="form-control"  disabled required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Nombre/Razón Social:</strong>
                    <input type="text" name="name_receiver" id="name_receiver" class="form-control"  disabled required>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="phone_receiver" id="phone_receiver" class="form-control"  disabled required>
                </div>
            </div>
        </div>
        <h5 class="h5 mb-3">Direccion</h5>
        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <select name="state_receiver" id="selectEdo" class="form-control w-100"  disabled required>
                        <option value="">Seleccione un estado</option>
                        @foreach ($estados as $edo)
                        <option value="{{ $edo->id }}" data-name="{{ $edo->estado }}">{{ $edo->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3 ">
                <div class="form-group">
                    <strong>Municipio:</strong>
                    <select name="province_receiver" id="selectProv" class="form-control w-100"  disabled required>
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3 ">
                <div class="form-group">
                    <strong>Ciudad:</strong>
                    <select name="city_receiver" id="selecCity" class="form-control w-100"  disabled required>
                        <option value="">Seleccione una ciudad</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-2 ">
                <div class="form-group">
                    <strong>Parroquia:</strong>
                    <select name="parroq_receiver" id="selectParroq" class="form-control w-100"  disabled required>
                        <option value="">Seleccione una parroquia</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-4 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Zona Postal:</strong>
                    <select name="zip_receiver" id="selectZip" class="form-control w-100"  disabled required>
                        <option value="">Seleccione un codigo postal</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Urbanización:</strong>
                    <input type="text" class="form-control" name="urban_receiver" id="urban_receiver" disabled >
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Edificio/Casa:</strong>
                    <input type="text" class="form-control" name="house_receiver" id="house_receiver" disabled >
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Via Principal:</strong>
                    <select name="address_receiver" id="address_receiver" class="form-control"  disabled required>
                        <option value="">Seleccione una opcion</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="1" name="reference_receiver" id="reference_receiver" placeholder="Punto de Referencia" disabled ></textarea>
                </div>
            </div>
        </div>

        <hr>
        <div class="col-md-12 my-5 text-center">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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

        function loadSenderAdress (estado_id, municipio_id, parroquia_id){
            $.ajax({
                url:"{{ route('getMunicipios') }}",
                method:"GET",
                data:{"estado_id":estado_id},
                dataType:"json",
                success:function(data){

                    $('#dropdownMunicipios').empty();
                    $('#dropdownMunicipios').append('<option value="">Seleccione un municipio</option>');

                    $.each(data, function(i, id, municipio) {
                        $('#dropdownMunicipios').append('<option value="'+data[i].id+'" data-name="'+data[i].municipio+'">'+data[i].municipio+'</option>');
                    });
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

            $.ajax({
                url:"{{ route('getCiudades') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){

                    $('#dropdownCiudades').empty();
                    $('#dropdownCiudades').append('<option value="">Seleccione una ciudad</option>');

                    $.each(data, function(i, id, ciudad) {
                        $('#dropdownCiudades').append('<option value="'+data[i].id+'" data-name="'+data[i].ciudad+'">'+data[i].ciudad+'</option>');
                    });
                },
                error: function (data) {
                    console.log('fail', data);
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
                        $('#dropdownParroquias').append('<option value="'+data[i].id+'" data-name="'+data[i].parroquia+'">'+data[i].parroquia+'</option>');
                    });
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

            $.ajax({
                url:"{{ route('getZipCodes') }}",
                method:"GET",
                data:{"parroquia_id":parroquia_id},
                dataType:"json",
                success:function(data){
                    $('#dropdownZip_codes').empty();
                    $('#dropdownZip_codes').append('<option value="">Seleccione una zona postal</option>');
                    $('#dropdownZip_codes').append('<option value="'+data.id+'" data-name="'+data.zip_code+'">'+data.zip_code+'</option>');
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

        }

        function loadReceiverAdress (estado_id, municipio_id, parroquia_id){
            $.ajax({
                url:"{{ route('getMunicipios') }}",
                method:"GET",
                data:{"estado_id":estado_id},
                dataType:"json",
                success:function(data){

                    $('#selectProv').empty();
                    $('#selectProv').append('<option value="">Seleccione un municipio</option>');

                    $.each(data, function(i, id, municipio) {
                        $('#selectProv').append('<option value="'+data[i].id+'" data-name="'+data[i].municipio+'">'+data[i].municipio+'</option>');
                    });
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

            $.ajax({
                url:"{{ route('getCiudades') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){

                    $('#selecCity').empty();
                    $('#selecCity').append('<option value="">Seleccione una ciudad</option>');

                    $.each(data, function(i, id, ciudad) {
                        $('#selecCity').append('<option value="'+data[i].id+'" data-name="'+data[i].ciudad+'">'+data[i].ciudad+'</option>');
                    });
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

            $.ajax({
                url:"{{ route('getParroquias') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){

                    $('#selectParroq').empty();
                    $('#selectParroq').append('<option value="">Seleccione una parroquia</option>');

                    $.each(data, function(i, id, parroquia) {
                        $('#selectParroq').append('<option value="'+data[i].id+'" data-name="'+data[i].parroquia+'">'+data[i].parroquia+'</option>');
                    });
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

            $.ajax({
                url:"{{ route('getZipCodes') }}",
                method:"GET",
                data:{"parroquia_id":parroquia_id},
                dataType:"json",
                success:function(data){
                    $('#selectZip').empty();
                    $('#selectZip').append('<option value="">Seleccione una zona postal</option>');
                    $('#selectZip').append('<option value="'+data.id+'" data-name="'+data.zip_code+'">'+data.zip_code+'</option>');
                },
                error: function (data) {
                    console.log('fail', data);
                }
            });

        }

        function activateSender (){
            $('#mail_sender').prop( "disabled", false );
            $('#name_sender').prop( "disabled", false );
            $('#phone_sender').prop( "disabled", false );
            $('#dropdownEstados').prop( "disabled", false );
            $('#dropdownMunicipios').prop( "disabled", false );
            $('#dropdownCiudades').prop( "disabled", false );
            $('#dropdownParroquias').prop( "disabled", false );
            $('#dropdownZip_codes').prop( "disabled", false );
            $("#urban_sender").prop( "disabled", false );
            $("#house_sender").prop( "disabled", false );
            $("#address_sender").prop( "disabled", false );
            $("#reference_sender").prop( "disabled", false );
        }

        function deactivateSender (){
            $('#mail_sender').prop( "disabled", true );
            $('#name_sender').prop( "disabled", true );
            $('#phone_sender').prop( "disabled", true );
            $('#dropdownEstados').prop( "disabled", true );
            $('#dropdownMunicipios').prop( "disabled", true );
            $('#dropdownCiudades').prop( "disabled", true );
            $('#dropdownParroquias').prop( "disabled", true );
            $('#dropdownZip_codes').prop( "disabled", true );
            $("#urban_sender").prop( "disabled", true );
            $("#house_sender").prop( "disabled", true );
            $("#address_sender").prop( "disabled", true );
            $("#reference_sender").prop( "disabled", true );
        }

        function clearSender(){
            $('#mail_sender').val("");
            $('#name_sender').val("");
            $('#phone_sender').val("");
            $('#dropdownEstados').val("");
            $('#dropdownMunicipios').val("");
            $('#dropdownCiudades').val("");
            $('#dropdownParroquias').val("");
            $('#dropdownZip_codes').val("");
            $("#urban_sender").val("");
            $("#house_sender").val("");
            $("#address_sender").val("");
            $("#reference_sender").val("");
        }

        function activateReceiver (){
            $('#mail_receiver').prop( "disabled", false );
            $('#name_receiver').prop( "disabled", false );
            $('#phone_receiver').prop( "disabled", false );
            $('#selectEdo').prop( "disabled", false );
            $('#selectProv').prop( "disabled", false );
            $('#selecCity').prop( "disabled", false );
            $('#selectParroq').prop( "disabled", false );
            $('#selectZip').prop( "disabled", false );
            $("#urban_receiver").prop( "disabled", false );
            $("#house_receiver").prop( "disabled", false );
            $("#address_receiver").prop( "disabled", false );
            $("#reference_receiver").prop( "disabled", false );
        }

        function deactivateReceiver (){
            $('#mail_receiver').prop( "disabled", true );
            $('#name_receiver').prop( "disabled", true );
            $('#phone_receiver').prop( "disabled", true );
            $('#selectEdo').prop( "disabled", true );
            $('#selectProv').prop( "disabled", true );
            $('#selecCity').prop( "disabled", true );
            $('#selectParroq').prop( "disabled", true );
            $('#selectZip').prop( "disabled", true );
            $("#urban_receiver").prop( "disabled", true );
            $("#house_receiver").prop( "disabled", true );
            $("#address_receiver").prop( "disabled", true );
            $("#reference_receiver").prop( "disabled", true );
        }

        function clearReceiver(){
            $('#mail_receiver').val("");
            $('#name_receiver').val("");
            $('#phone_receiver').val("");
            $('#selectEdo').val("");
            $('#selectProv').val("");
            $('#selecCity').val("");
            $('#selectParroq').val("");
            $('#selectZip').val("");
            $("#urban_receiver").val("");
            $("#house_receiver").val("");
            $("#address_receiver").val("");
            $("#reference_receiver").val("");
        }

        function calcular_precio(){
            var precioTotal = 0;
            $(".package_data").children(".group").each(function( index ) {
                @foreach ($tipo_paquetes as $tipo)
                    var tipo = {{$tipo->id}};
                    if($(this).find(".type_package option:selected").val() == tipo && tipo!=1){
                        var precio = {{$tipo->precio}}
                        precioTotal = precioTotal + precio;
                    }
                    else{
                        var precio = 0;
                        precioTotal = precioTotal + precio;
                        //aqui va la formula del peso y toda esa verga
                    }
                @endforeach
            });
            $("#price_package").val(precioTotal);
        }

        $("#submit").click(function () {
            activateSender();
            activateReceiver();
            calcular_precio();
            $("#price_package").prop( "disabled", false );
        });

        $("#user_search_sender").click(function () {
            var cliente_id =  $("#id_sender").val();
            //alert(cliente_id);
            $.ajax({
            url:"{{ route('getAddress') }}",
            method:"GET",
            data:{"cliente_id":cliente_id},
            dataType:"json",
            success:function(data){
                if(data.estado_id != 'NULL'){
                    deactivateSender();

                    loadSenderAdress (data.direccion.estado_id, data.direccion.municipio_id, data.direccion.parroquia_id);

                    setTimeout(function(){
                        $('#mail_sender').val( data.email );
                        $('#name_sender').val( data.nombre_razonsocial );
                        $('#phone_sender').val( data.telefono );
                        $('#dropdownEstados').val(data.direccion.estado_id);
                        $('#dropdownMunicipios').val(data.direccion.municipio_id);
                        $('#dropdownCiudades').val(data.direccion.ciudad_id);
                        $('#dropdownParroquias').val(data.direccion.parroquia_id);
                        $('#dropdownZip_codes').val(data.direccion.zip_code_id);
                        $("#urban_sender").val(data.direccion.urbanizacion);
                        $("#house_sender").val(data.direccion.edificio_casa);
                        $("#address_sender").val(data.direccion.via_principal);
                        $("#reference_sender").val(data.direccion.punto_referencia);
                        $('#user_edit_sender').prop( "hidden", false );
                    }, 1800);
                }
                else{
                    alert("No encontrado");
                    clearSender();
                    activateSender();
                }
            },
            error: function (data) {
                console.log('fail', data);
            }
            });
        });


        $('#user_edit_sender').click(function() {
            activateSender();
        });

        $('#user_create_sender').click(function() {
            clearSender();
            activateSender();
        });

        $("#user_search_receiver").click(function () {
            var cliente_id =  $("#id_receiver").val();
            //alert(cliente_id);
            $.ajax({
            url:"{{ route('getAddress') }}",
            method:"GET",
            data:{"cliente_id":cliente_id},
            dataType:"json",
            success:function(data){
                if(data.estado_id != 'NULL'){
                    deactivateReceiver();

                    loadReceiverAdress (data.direccion.estado_id, data.direccion.municipio_id, data.direccion.parroquia_id);

                    setTimeout(function(){
                        $('#mail_receiver').val( data.email );
                        $('#name_receiver').val( data.nombre_razonsocial );
                        $('#phone_receiver').val( data.telefono );
                        $('#selectEdo').val(data.direccion.estado_id);
                        $('#selectProv').val(data.direccion.municipio_id);
                        $('#selecCity').val(data.direccion.ciudad_id);
                        $('#selectParroq').val(data.direccion.parroquia_id);
                        $('#selectZip').val(data.direccion.zip_code_id);
                        $("#urban_receiver").val(data.direccion.urbanizacion);
                        $("#house_receiver").val(data.direccion.edificio_casa);
                        $("#address_receiver").val(data.direccion.via_principal);
                        $("#reference_receiver").val(data.direccion.punto_referencia);
                        $('#user_edit_receiver').prop( "hidden", false );
                    }, 1800);
                }
                else{
                    alert("No encontrado");
                    activateReceiver();
                    clearReceiver();
                }
            },
            error: function (data) {
                console.log('fail', data);
            }
            });
        });


        $('#user_edit_receiver').click(function() {
            activateReceiver();
        });
        $('#user_create_receiver').click(function() {
            clearReceiver();
            activateReceiver();
        });



        $("#calcular_precio").click(function () {
            calcular_precio();
        });

        $(document).on( "change", ".type_package", function() {
            if($(this).val() != 1){
                $(this).parent().parent().siblings().each(function( index ) {
                    if($(this).hasClass("d-none") == false){
                        $(this).addClass("d-none");
                    }
                });
                if($(this).parent().parent().siblings().last().hasClass("d-none")){
                    $(this).parent().parent().siblings().last().removeClass("d-none");
                }
            }
            if($(this).val() == 1){
                $(this).parent().parent().siblings().each(function( index ) {
                    if($(this).hasClass("d-none")){
                        $(this).removeClass("d-none");
                    }
                });
                if($(this).parent().parent().siblings().last().hasClass("d-none")){
                    $(this).parent().parent().siblings().last().removeClass("d-none");
                }
            }
        });


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


        $( '#dropdownParroquias' ).change(function(e) {
            $('#dropdownZip_codes').empty();
            $('#dropdownZip_codes').append('<option value="">Seleccione una zona postal</option>');
            var parroquia_id = e.target.value;
            $.ajax({
            url:"{{ route('getZipCodes') }}",
            method:"GET",
            data:{"parroquia_id":parroquia_id},
            dataType:"json",
            success:function(data){
                $('#dropdownZip_codes').append('<option value="'+data.id+'" data-name="'+data.zip_code+'">'+data.zip_code+'</option>');
            },
            error: function (data) {
                console.log('fail', data);
            }
            });

        });


        $('#dropdownMunicipios' ).change(function(e) {
        $('#dropdownZip_codes').empty();
        $('#dropdownZip_codes').append('<option value="">Seleccione una zona postal</option>');
        $('#dropdownCiudades').empty();
        $('#dropdownCiudades').append('<option value="">Seleccione una ciudad</option>');
        $('#dropdownParroquias').empty();
        $('#dropdownParroquias').append('<option value="">Seleccione una parroquia</option>');

        var municipio_id = e.target.value;
        console.log('municipio_id', municipio_id);

        $.ajax({
            url:"{{ route('getCiudades') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){
                $.each(data, function(i, id, ciudad) {
                    $('#dropdownCiudades').append('<option value="'+data[i].id+'" data-name="'+data[i].ciudad+'">'+data[i].ciudad+'</option>');
                });
            },
            error: function (data) {
                console.log('fail', data);
            }
            });

            $.ajax({
            url:"{{ route('getParroquias') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){
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
            $('#dropdownZip_codes').empty();
            $('#dropdownZip_codes').append('<option value="">Seleccione una zona postal</option>');
            $('#dropdownCiudades').empty();
            $('#dropdownCiudades').append('<option value="">Seleccione una ciudad</option>');
            $('#dropdownParroquias').empty();
            $('#dropdownParroquias').append('<option value="">Seleccione una parroquia</option>');
            $('#dropdownMunicipios').empty();
            $('#dropdownMunicipios').append('<option value="">Seleccione un municipio</option>');

            var estado_id = e.target.value;
            $.ajax({
            url:"{{ route('getMunicipios') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
            success:function(data){
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
            $('#selectProv').empty();
            $('#selectProv').append('<option value="">Seleccione un municipio</option>');
            $('#selecCity').empty();
            $('#selecCity').append('<option value="">Seleccione una ciudad</option>');
            $('#selectParroq').empty();
            $('#selectParroq').append('<option value="">Seleccione una parroquia</option>');
            $('#selectZip').empty();
            $('#selectZip').append('<option value="">Seleccione una zona postal</option>');

            var estado_id = e.target.value;

            $.ajax({
            url:"{{ route('getMunicipios') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
                success:function(data){
                    $('#selectProv').empty();
                    $('#selectProv').append('<option value="">Seleccione un municipio</option>');
                    $.each(data, function(i, id, municipio) {
                        $('#selectProv').append('<option value="'+data[i].id+'" data-name="'+data[i].municipio+'">'+data[i].municipio+'</option>');
                    });
                }
            });
        });

        $( '#selectProv' ).change(function(e) {
            $('#selecCity').empty();
            $('#selecCity').append('<option value="">Seleccione una ciudad</option>');
            $('#selectParroq').empty();
            $('#selectParroq').append('<option value="">Seleccione una parroquia</option>');
            $('#selectZip').empty();
            $('#selectZip').append('<option value="">Seleccione una zona postal</option>');

            var municipio_id = e.target.value;

            $.ajax({
                url:"{{ route('getCiudades') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){
                    $.each(data, function(i, id, ciudad) {
                        $('#selecCity').append('<option value="'+data[i].id+'" data-name="'+data[i].ciudad+'">'+data[i].ciudad+'</option>');
                    });
                }
            });

            $.ajax({
                url:"{{ route('getParroquias') }}",
                method:"GET",
                data:{"municipio_id":municipio_id},
                dataType:"json",
                success:function(data){
                    $.each(data, function(i, id, parroquia) {
                        $('#selectParroq').append('<option value="'+data[i].id+'" data-name="'+data[i].parroquia+'">'+data[i].parroquia+'</option>');
                    });
                }
            });
        });

        $( '#selectParroq' ).change(function(e) {
            $('#selectZip').empty();
            $('#selectZip').append('<option value="">Seleccione una zona postal</option>');
            var parroquia_id = e.target.value;
            $.ajax({
                url:"{{ route('getZipCodes') }}",
                method:"GET",
                data:{"parroquia_id":parroquia_id},
                dataType:"json",
                success:function(data){
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
